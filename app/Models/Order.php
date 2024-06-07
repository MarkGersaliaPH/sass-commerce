<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Yajra\Address\HasAddress;

class Order extends Model
{
    use HasFactory;
    // use HasAddress;

    protected $fillable = ['user_id', 'store_id', 'total_amount', 'status', 'shipping_address', 'contact_no', 'contact_name', 'payment_method', 'guest_checkout', 'customer_id', 'order_id', 'tax', 'sub_total','transaction_id','notifications'];

    protected $casts = [
        'status' => OrderStatus::class,
        'notifications' =>"array"
    ];

    protected $appends = ['shipping_address_display'];

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

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'model_id');
    }

    public function guestCustomer(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'customer_id');
    }

    public function displayAddress()
    {
        return sprintf(
            '%s, Barangay %s, %s',
            $this->shipping_details->street ?? '',
            $this->shipping_details->barangay ?? '',
            $this->shipping_details->city ?? ''
        );
    }

    public function scopeNew($query)
    {
        return $query->where('status', OrderStatus::New);
    }

    public function shipping_details()
    {
        return $this->hasOne(OrderShippingDetail::class);
    }

    public function getShippingAddressDisplayAttribute()
    {
        return $this->displayAddress();
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'order_transaction_id');
    }
}
