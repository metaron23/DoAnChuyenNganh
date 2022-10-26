<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mon_an');
            $table->string('ten_mon_an')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->integer('so_luong_mua')->default(1);
            $table->double('don_gia_mua')->nullable();
            $table->integer('id_don_hang')->nullable();
            $table->integer('id_tai_khoan');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('gio_hangs');
    }
};
