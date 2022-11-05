<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->integer('id_nguoi_xac_nhan')->nullable();
            $table->text('email_nguoi_xac_nhan')->nullable();
        });
    }

    public function down()
    {
        //
    }
};
