<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'plan',
        'amount',
        'payment_type',
        'transaction_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
