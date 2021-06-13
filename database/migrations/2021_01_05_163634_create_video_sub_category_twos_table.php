<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoSubCategoryTwosTable extends Migration
{

    public function up()
    {
        Schema::create('video_sub_category_twos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('sub_category_one_id')->index();
            $table->string('name');
            $table->string('thumb_img');
            $table->text('description');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('video_categories')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('sub_category_one_id')->references('id')->on('video_sub_category_ones')
                ->onUpdate('cascade')->onDelete('restrict');

        });
    }


    public function down()
    {
        Schema::dropIfExists('video_sub_category_twos');
    }
}
