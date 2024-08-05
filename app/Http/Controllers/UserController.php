<?php

namespace App\Http\Controllers;

use App\Models\Data_ktp;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterMail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {

        return view("user");
    }

    public function getUser(Request $request)
    {
        $user = User::all();
        return datatables()->of($user)->addIndexColumn()->toJson();
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        dd(response()->json(compact("user")));
        return response()->json(compact("user"));
    }

    public function viewLogin()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8"
        ]);

        if (!\Auth::attempt(["email" => $request->email, "password" => $request->password]))
            return redirect("/login");

        return redirect("/dashboard");
    }

    public function viewRegister()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        $request->validate([
            "nama" => "required|string|min:8|max:255",
            "email" => ['required', 'email', Rule::unique("user", "email")->whereNull("deleted_at")],
            "nik" => "required|max:15",
            "password" => "required|min:8",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "photo" => "required|mimes:png,jpg,jpeg"
        ], [
            "nama" => "Nama anda kurang panjang!",
            "email" => "Nama anda kurang panjang!",
            "nik" => "Nama anda kurang panjang!",
            "password" => "Nama anda kurang panjang!",
            "tempat_lahir" => "Nama anda kurang panjang!",
            "tanggal_lahir" => "Nama anda kurang panjang!",
            "photo" => "Nama anda kurang panjang!",
        ]);

        $id_user = Data_ktp::where("nik", $request->nik)->first();
        // $email = User::where("email", $request->email)->where("deleted_at", null)->first();


        if ($id_user) {
            return redirect("/login");
        }

        $data_ktp = $request->except(["_method", "_token", "password", "email", "foto"]);
        $data_user = $request->except(["_method", "_token", "nama", "tempat_lahir", "tanggal_lahir", "foto", "nik"]);
        $data_user["role"] = 1;
        $data_user["password"] = bcrypt($request->password, ["rounds" => 13]);
        $data_user["id_user"] = $request->nik;

        $photoName = time() . "." . $request->file("photo")->getClientOriginalExtension();
        $request->photo->move(public_path("photo"), $photoName);
        $data_ktp["foto"] = $photoName;


        $ktp = Data_ktp::create($data_ktp);
        $user = User::create($data_user);

        \Mail::to($request->email)->send(new RegisterMail());

        return redirect("login");
    }

    public function viewEdit($id_user)
    {
        if (!$id_user)
            return redirect("/admin/user");

        $user = User::with("data_ktp")->where("id_user", $id_user)->first();


        return view("edit", compact("user"));

    }

    public function edit(Request $request, $id_user)
    {
        $request->validate([
            "nama" => "required|string|min:8|max:255",
            "email" => "required|email",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
        ]);

        $data_ktp = $request->except(["_method", "_token", "email"]);
        $data_user = $request->except(["_method", "_token", "nama", "tempat_lahir", "tanggal_lahir", "nik"]);

        $ktp = Data_ktp::where("nik", $id_user)->first();
        $user = User::where("id_user", $id_user)->first();

        $ktp->update($data_ktp);
        $user->update($data_user);

        return redirect("/dashboard");
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect("login");
    }

    public function delete($id)
    {
        // dd($request->route("id"));
        $user = User::find($id);
        $ktp = Data_ktp::find($id);

        $user->delete();
        $ktp->delete();

        return redirect()->back();
    }
}
