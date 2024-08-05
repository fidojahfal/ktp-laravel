<?php

namespace App\Exports;

use App\Models\Data_ktp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKtp implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Data_ktp::orderBy("nik", "asc")->get();
    }

    public function headings(): array
    {
        return [
            "Id",
            "NIK",
            "Nama",
            "Tempat Lahir",
            "Tanggal Lahir",
            "Foto",
            "created_at",
            "updated_at"
        ];
    }
}
