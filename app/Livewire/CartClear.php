<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartClear extends Component
{
    public function onClear()
    {
        Cart::destroy();

        $this->dispatch('cart_updated');
    }

    public function render()
    {
        return view('livewire.cart-clear');
    }
}
