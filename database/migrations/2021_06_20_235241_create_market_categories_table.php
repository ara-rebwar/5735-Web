<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('market_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('market_id')->unsigned();
            $table->integer('category_id');
            $table->integer('media_id')->unsigned();
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('media_id')->references('id')->on('media');
            $table->primary(['market_id','category_id']);
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
        Schema::dropIfExists('market_categories');
    }
}
