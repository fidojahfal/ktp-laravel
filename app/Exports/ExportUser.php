<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all()->except(["password"]);
    }

    public function headings(): array
    {
        return [
            "id",
            "id_user",
            "email",
            "role",
            "created_at",
            "updated_at"
        ];
    }
}
