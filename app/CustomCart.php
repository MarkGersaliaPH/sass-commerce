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
        return number_format(self::total() + $this->shipping_fee(),2);
    }
}