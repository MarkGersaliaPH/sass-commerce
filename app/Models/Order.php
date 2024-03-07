<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable  = ['user_id', 'store_id', 'total_amount', 'shipping_fee', 'status', 'shipping_address', 'contact_no', 'contact_name', 'payment_method'];


    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    public function address(): HasOne
    {
        return $this->hasOne(ShippingAddress::class);
    }
    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            dd($model->order_items); 
        });
    }
}
