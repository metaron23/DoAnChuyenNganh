<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->integer('id_khach_hang');
            $table->string('ten_khach_hang');
            $table->string('email_khach_hang');
            $table->string('phone_khach_hang');
            $table->string('ten_ship')->nullable();
            $table->string('phone_ship')->nullable();
            $table->string('dia_chi_ship')->nullable();
            $table->boolean('trang_thai_thanh_toan')->default(0);
            $table->integer('trang_thai_don_hang')->default(0);
            $table->integer('tong_tien');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
};
