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

    protected $fillable = ['name','images','description','price','promo_price','created_by_id','store_id', 'category_id','is_enabled'];


    protected $casts = [
        'images' => 'array',
    ];
 

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
 
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class,'order_items')->withTimeStamps();
    }


    
}
