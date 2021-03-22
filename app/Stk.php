<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stk extends Model
{
    protected $table = 'stk_push_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requestId', 'errorCode', 'errorMessage', 'MerchantRequestID',
        'CheckoutRequestID', 'ResponseCode', 'ResponseDescription',
        'CustomerMessage','user_id',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
