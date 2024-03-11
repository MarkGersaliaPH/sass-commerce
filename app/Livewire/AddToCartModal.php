<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class AddToCartModal extends Component
{

    #[On('cart_updated')]
    public function productSelected(){

    }
    public function render()
    {
        return view('livewire.add-to-cart-modal');
    }
}
