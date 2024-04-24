<?php

namespace App\Livewire\Checkout;

use App\CustomCart;
use Livewire\Component;

class CartContent extends Component
{
    public function render()
    {

        $data['cart_data'] = CustomCart::content();

        return view('livewire.checkout.cart-content', ['data' => $data]);
    }
}
