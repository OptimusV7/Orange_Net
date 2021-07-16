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
            $table->integer('user_id')->nullable();
            $table->String('MerchantRequestID')->nullable();
            $table->String('CheckoutRequestID')->nullable();
            $table->integer('ResultCode')->nullable();
            $table->integer('amount')->nullable();
            $table->String('MpesaReceiptNumber')->nullable();
            $table->String('TransactionDate')->nullable();
            $table->String('PhoneNumber')->nullable();
            $table->string('ResultDesc')->nullable();
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
