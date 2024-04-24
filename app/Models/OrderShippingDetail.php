<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'contact_no',
        'email',
        'region',
        'city',
        'province',
        'barangay',
        'street',
        'address',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
