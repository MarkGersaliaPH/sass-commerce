<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

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
