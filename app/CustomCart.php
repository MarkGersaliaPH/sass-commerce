<?php
namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;

class CustomCart extends Cart
{
    public static function shipping_fee(){
        return number_format(config('shipping_fee',40),2);
    }

    public function totalWithShippingFee()
    { 
        $total = floatval(str_replace(',', '', self::total())) + $this->shipping_fee();

        return number_format($total,2);
    }
}