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
        $ktp = Data_ktp::find($id);
        $user = User::find($id);

        $ktp->delete();
        $user->delete();

        return redirect()->back();
    }
}
