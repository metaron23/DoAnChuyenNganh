<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->date('nam_sinh')->nullable();
            $table->boolean('gioi_tinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai');
            $table->string('email');
            $table->string('password');
            $table->string('anh_dai_dien')->nullable();
            $table->integer('loai_tai_khoan')->nullable();
            $table->integer('id_chi_nhanh')->default(0);
            $table->boolean('tinh_trang')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tai_khoans');
    }
};
