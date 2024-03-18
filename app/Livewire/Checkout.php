<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public function render()
    { 
        
        return view('livewire.checkout');
    }
}
