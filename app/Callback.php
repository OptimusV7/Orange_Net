<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $table = 'callbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'MerchantRequestID', 'CheckoutRequestID', 'ResultCode',
        'amount', 'MpesaReceiptNumber', 'TransactionDate',
        'PhoneNumber','ResultDesc',
    ];



}
