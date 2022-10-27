<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_muc_mon_ans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_danh_muc');
            $table->string('ten_danh_muc');
            $table->string('slug_danh_muc');
            $table->integer('tinh_trang_danh_muc');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('danh_muc_mon_ans');
    }
};
