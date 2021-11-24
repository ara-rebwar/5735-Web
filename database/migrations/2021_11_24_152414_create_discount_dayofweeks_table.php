<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountDayofweeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_dayofweeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discount_market')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->foreign('discount_market')->references('id')->on('discount_markets');
            $table->foreign('day_id')->references('id')->on('id');
            $table->primary(['day_id','discount_market']);
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
        Schema::dropIfExists('discount_dayofweeks');
    }
}
