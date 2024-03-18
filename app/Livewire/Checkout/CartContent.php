<?php

namespace App\Livewire\Checkout;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartContent extends Component
{
    public function render()
    {
        
        $cart_data = Cart::content();
        return view('livewire.checkout.cart-content',compact('cart_data'));
    }
}
