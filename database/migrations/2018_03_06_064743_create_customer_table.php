<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('type');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->string('phone');
            $table->integer('points');
            
            
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
        Schema::dropIfExists('customer');
    }
}
