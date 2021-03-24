<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callbacks', function (Blueprint $table) {
            $table->bigIncrements('callback_id');
            $table->integer('user_id');
            $table->String('MerchantRequestID');
            $table->String('CheckoutRequestID');
            $table->integer('ResultCode');
            $table->integer('amount');
            $table->integer('MpesaReceiptNumber');
            $table->integer('TransactionDate');
            $table->integer('PhoneNumber');
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
        Schema::dropIfExists('callbacks');
    }
}
