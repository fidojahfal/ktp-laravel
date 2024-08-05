<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_ktp extends Model
{
    use HasFactory;
    protected $table = "data_ktp";
    protected $primaryKey = "nik";
    protected $fillable = ["tanggal_lahir", "nik", "tempat_lahir", "nama", "foto"];

    public function jenis_kelamin()
    {
        return $this->belongsTo("App\Models\Jenis_kelamin", "id_jenis_kelamin");
    }

    public function user()
    {
        return $this->hasOne("App/Models/User", "nik");
    }
}
