<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("user")->insert([
            "id_user" => "12345679",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin123", ["round" => 13]),
            "role" => "2",
        ]);
    }
}
