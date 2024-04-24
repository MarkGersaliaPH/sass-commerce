<?php

namespace App\Livewire\Cart;

use App\CustomCart;
use Livewire\Component;

class Table extends Component
{
    public $simple;

    public function mount($simple = false)
    {
        $this->simple = $simple;
    }

    public function remove($rowId)
    {
        CustomCart::remove($rowId);
        $this->dispatch('cart_updated');
    }

    public function decrease($rowId)
    {
        $cart = CustomCart::get($rowId);
        CustomCart::update($rowId, $cart->qty - 1);
        $this->dispatch('cart_updated');
    }

    public function increase($rowId)
    {
        $cart = CustomCart::get($rowId);
        CustomCart::update($rowId, $cart->qty + 1);
        $this->dispatch('cart_updated');
    }

    public function render()
    {
        $cart_data = CustomCart::content();
        if ($this->simple) {
            return view('livewire.cart.simple-table', compact('cart_data'));
        }

        return view('livewire.cart.table', compact('cart_data'));
    }
}
