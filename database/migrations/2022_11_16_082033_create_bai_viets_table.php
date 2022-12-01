<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->string('noi_dung_ngan');
            $table->string('hinh_anh');
            $table->string('noi_dung_chi_tiet');
            $table->integer('id_nguoi_dang');
            $table->string('ten_nguoi_dang');
            $table->integer('id_danh_muc');
            $table->string('ten_danh_muc');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('bai_viets');
    }
};
