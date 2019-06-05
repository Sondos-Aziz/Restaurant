<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
//            $table->bigIncrements('id')->nullable($value = false);
//            $table->bigInteger('customer_id')->unsigned();
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
//            $table->date('received');
//            $table->date('shipped');
//
//            $table->bigIncrements('id')->nullable($value = false);
////            $table->timestamps();
//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->text('cart');
//            $table->text('address');
//            $table->string('name');
//            $table->string('payment_id');
            $table->bigIncrements('id');
            $table->integer('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//            $table->string('name');
            $table->string('phone');
            $table->text('address');
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
        Schema::dropIfExists('orders');
    }
}
