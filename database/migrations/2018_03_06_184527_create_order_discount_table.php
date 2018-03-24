<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable()->index();
            $table->integer('discount_id')->unsigned()->nullable()->index();
            $table->double('orderDiscount', 8, 2);
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
        Schema::dropIfExists('order_discount');
    }
}
