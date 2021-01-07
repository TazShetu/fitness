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
            $table->text('description')->nullable();
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
