<?php

namespace App\Livewire\Checkout;

use App\CustomCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartContent extends Component
{
    public function render()
    {
          
        $data['cart_data'] = CustomCart::content();  

        return view('livewire.checkout.cart-content',['data'=>$data]);
    }
}
