<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id')->nullable();     //Kode pembayaran sistem
            $table->string('transaction_id')->nullable();   //id charge dari payment gateway
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('gateway')->nullable(); //xendit or midtrans
            $table->string('payment_type')->nullable(); 
            $table->bigInteger('amount');
            $table->string('status');
            $table->string('retail_payment_id')->nullable(); //hanya untuk alfamart dan indomaret
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
        Schema::dropIfExists('payments');
    }
}
