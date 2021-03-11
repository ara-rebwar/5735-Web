<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->string('text');
            $table->integer('media')->unsigned();
            $table->integer('product')->unsigned();
            $table->integer('market')->unsigned();
            $table->foreign('media')->references('id')->on('media');
            $table->foreign('product')->references('id')->on('products');
            $table->foreign('market')->references('id')->on('markets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
