<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = "user";

    protected $guarded = ["id", "created_at"];

    protected $hidden = ["password"];

    public function data_ktp()
    {
        return $this->belongsTo("App\Models\Data_ktp", "id_user");
    }
}
