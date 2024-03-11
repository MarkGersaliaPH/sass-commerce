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
 

    protected $appends  = ['image','display_price'];

    public function store(){
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

    public function order(){
        return $this->belongsToMany(Order::class,'order_items')->withTimeStamps();
    }

    public function getImageAttribute(){ 
        return $this->images ? asset('storage/'.$this->images[0]) : null;
    }

    public function getDisplayPriceAttribute(){
        return "P" . ($this->promo_price ?  $this->promo_price : $this->price);
    }

    public function scopeIsEnabled($query){
        return $query->where('is_enabled',true);
    }
    
}
