<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class CartCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Cart::count();
    }


    #[On('cart_updated')]
    public function updateCartCounter()
    {
        $this->count = Cart::count();
    }

    

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
