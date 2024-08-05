<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kelamin extends Model
{
    use HasFactory;
    protected $table = "jenis_kelamin";
    protected $fillable = ["nama_jenis_kelamin"];

    public function data_ktp()
    {
        return $this->hasMany("App\Models\Data_ktp", "id_jenis_kelamin");
    }
}
