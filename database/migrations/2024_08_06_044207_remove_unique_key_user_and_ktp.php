<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueKeyUserAndKtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("user", function (Blueprint $table) {
            $table->dropUnique("user_email_unique");
            $table->dropUnique("user_id_user_unique");
        });

        Schema::table("data_ktp", function (Blueprint $table) {
            $table->dropUnique("data_ktp_nik_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
