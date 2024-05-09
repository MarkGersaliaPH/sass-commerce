<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['order_transaction_id','shipping_fee','total_amount'];
    

    public function orders(){
        return $this->hasMany(Order::class, 'transaction_id', 'order_transaction_id');
    }
}
