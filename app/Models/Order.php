<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Yajra\Address\HasAddress;

class Order extends Model
{
    use HasFactory;
    use HasAddress;

    protected $fillable  = ['user_id', 'store_id', 'total_amount', 'shipping_fee', 'status', 'shipping_address', 'contact_no', 'contact_name', 'payment_method','guest_checkout','customer_id'];


    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'orderItems');
    }

    public function shippingAddressDetails(): MorphTo
    {
        return $this->morphTo(Address::class);
    } 

    public function guestCustomer(): BelongsTo
    {
        return $this->belongsTo(Guest::class,'customer_id');
    }
}
