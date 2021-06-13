<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{

    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('length');
            $table->string('music')->unique();
            $table->string('thumb_img')->unique();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('music');
    }
}
