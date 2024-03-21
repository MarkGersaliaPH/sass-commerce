<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ProductObserver::class])]

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'images', 'description', 'price', 'promo_price', 'created_by_id', 'store_id', 'category_id', 'is_enabled', 'preparation_time'];


    protected $casts = [
        'images' => 'array',
    ];


    protected $appends  = ['image', 'display_price', 'discount_percentage', 'display_preparation_time', 'final_price'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_items')->withTimeStamps();
    }

    public function getImageAttribute()
    {
        return $this->images ? asset('storage/' . $this->images[0]) : null;
    }

    public function getDisplayPriceAttribute()
    {
        if ($this->promo_price) {
            return "<span class='text-strike'>P{$this->price}</span>  - <span class='text-danger'>P{$this->promo_price}</span>";
        }
        return "P" . $this->price;
    }

    public function setFinalPriceAttribute()
    {
        if ($this->promo_price) {
            return $this->promo_price;
        } else {
            return $this->price;
        }
    }

    public function getFinalPriceAttribute()
    {
        return $this->setFinalPriceAttribute();
    }

    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }


    public function scopeIsDiscounted($query)
    {
        return $query->whereNotNull('promo_price');
    }

    public function setDiscountPerecentage()
    {
        $percentageDecrease = (($this->price - $this->promo_price) / $this->price) * 100;
        return number_format(floatval($percentageDecrease));
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->promo_price) {
            return $this->setDiscountPerecentage();
        }

        return null;
    }


    public function getDisplayPreparationTimeAttribute()
    {
        return $this->preparation_time ?  $this->preparation_time . " Mins" : null;
    }

    public function calculateTax()
    {
        // Define the tax rate (12%)
        $taxRate = 12;

        // Calculate the total price
        $totalPrice = $this->setFinalPriceAttribute();
 
        // Calculate the tax amount
        $taxAmount = ($taxRate/100) * $totalPrice;
 
        // Return the tax amount
        return $taxAmount;
    }
}
