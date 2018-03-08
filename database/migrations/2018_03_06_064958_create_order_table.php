<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
                    
            $table->increments('id');
            $table->integer('orderNumber')->unique();
            $table->date('orderDate');
            $table->string('status');
            $table->string('paymentMethod');
            $table->double('tax', 8, 2);
            $table->double('shippingCost', 8, 2);
            $table->date('shippingDate');
            $table->double('totalPrice', 8, 2);
            $table->text('notes');
            $table->integer('customer_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('shipper_id')->unsigned()->nullable()->index();
            $table->integer('city_id')->unsigned()->nullable()->index();
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
        Schema::dropIfExists('order');
    }
}
