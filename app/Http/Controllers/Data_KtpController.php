<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\Data_ktp;
use App\Models\User;
use Illuminate\Validation\Rule;

class Data_KtpController extends Controller
{
    public function index(Request $request)
    {
        return view("ktp.index");
    }

    public function getKtp(Request $request)
    {

        $data_ktp = Data_ktp::with("user")->get();
        return datatables()->of($data_ktp)->addIndexColumn()->toJson();

    }

    public function viewAddData()
    {
        return view("register");
    }

    public function addData(Request $request)
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
            return redirect()->back();
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

        return redirect("/admin/ktp");
    }

    public function delete($id)
    {
        $ktp = Data_ktp::find($id);
        $user = User::find($id);

        $ktp->delete();
        $user->delete();

        return redirect()->back();
    }
}
