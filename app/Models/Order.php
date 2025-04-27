<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'date_order',
        'total',
        'shipping_address',
        'phone_number',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
