<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    public $table = "users_verify";

    /**
     * Write code on Method
     *
     *
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Write code on Method
     *
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
