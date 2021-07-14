<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StkPushLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stk_push_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('requestId')->default('null');
            $table->string('errorCode')->default('null');
            $table->string('errorMessage')->default('null');
            $table->string('MerchantRequestID')->default('null');
            $table->string('CheckoutRequestID')->default('null');
            $table->string('ResponseCode')->default('null');
            $table->string('ResponseDescription')->default('null');
            $table->string('CustomerMessage');
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
        Schema::dropIfExists('stk_push_log');
    }
}
