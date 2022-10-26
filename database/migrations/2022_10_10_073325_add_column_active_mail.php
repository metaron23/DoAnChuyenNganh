<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::table('tai_khoans', function (Blueprint $table) {
            $table->string('hash')->nullable();
            $table->string('hash_reset')->nullable();
        });
    }

    public function down()
    {
        //
    }
};
