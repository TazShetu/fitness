<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoSubCategoryOnesTable extends Migration
{

    public function up()
    {
        Schema::create('video_sub_category_ones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('name');
            $table->string('thumb_img');
            $table->string('expected_result');
            $table->string('bullet_point_one');
            $table->string('bullet_point_two')->nullable();
            $table->string('bullet_point_three')->nullable();
            $table->string('male_img');
            $table->string('male_image_description');
            $table->string('male_img_2');
            $table->string('male_image_description_2');
            $table->string('female_img');
            $table->string('female_image_description');
            $table->string('female_img_2');
            $table->string('female_image_description_2');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('video_categories')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('video_sub_category_ones');
    }
}
