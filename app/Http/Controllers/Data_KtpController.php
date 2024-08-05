<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_ktp;
use App\Models\User;

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

    public function delete($id)
    {
        $user = User::where("id_user", $id)->delete();
        $ktp = Data_ktp::where("nik", $id)->delete();

        return redirect("/admin/ktp");
    }
}
