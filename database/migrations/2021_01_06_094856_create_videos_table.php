<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{

    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('sub_category_one_id')->index();
            $table->unsignedBigInteger('sub_category_two_id')->index();
            $table->string('title');
            $table->float('length');
            $table->string('instruction_title');
            $table->string('video')->unique();
            $table->float('calorie');
            $table->string('thumb_img');
            $table->integer('number_loop');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('video_categories')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('sub_category_one_id')->references('id')->on('video_sub_category_ones')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('sub_category_two_id')->references('id')->on('video_sub_category_twos')
                ->onUpdate('cascade')->onDelete('restrict');

        });
    }


    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
