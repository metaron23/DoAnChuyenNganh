<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('mon_ans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_mon_an');
            $table->string('ten_mon_an');
            $table->string('slug_mon_an');
            $table->integer('tinh_trang');
            $table->double('don_gia_ban', 18, 0);
            $table->double('don_gia_khuyen_mai', 18, 0)->default(0);
            $table->string('hinh_anh');
            $table->longText('mo_ta_ngan');
            $table->longText('mo_ta_chi_tiet');
            $table->integer('id_danh_muc');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mon_ans');
    }
};
