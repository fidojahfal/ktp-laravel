<?php

namespace App\Http\Controllers;

use App\Exports\ExportKtp;
use App\Exports\ExportUser;
use App\Models\Data_ktp;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Excel;

class FileController extends Controller
{
    public function downloadPdfUser()
    {
        $users = User::all();
        $pdf = PDF::loadView("pdf_user", compact("users"));

        return $pdf->download(time() . "_data_user.pdf");


    }
    public function downloadPdfKtp()
    {
        $data_ktp = Data_ktp::all();

        $pdf = PDF::loadView("ktp.pdf_ktp", compact("data_ktp"));

        return $pdf->download(time() . "_data_ktp.pdf");
    }

    public function exportKtp()
    {
        return Excel::download(new ExportKtp, time() . "_ktp.xlsx");
    }

    public function exportUser()
    {
        return Excel::download(new ExportUser, time() . "_user.xlsx");
    }
}
