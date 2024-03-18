<?php

namespace App\Livewire\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Table extends Component
{


    public function remove($rowId){ 
        Cart::remove($rowId);
        $this->dispatch('cart_updated');
    }

    public function decrease($rowId){
        $cart = Cart::get($rowId); 
        Cart::update($rowId,$cart->qty - 1); 
        $this->dispatch('cart_updated');
    }

    
    public function increase($rowId){
        $cart = Cart::get($rowId); 
        Cart::update($rowId,$cart->qty + 1); 
        $this->dispatch('cart_updated');
    }
    public function render()
    { 
        $cart_data = Cart::content();
        
// Group the items by 'store_id'
// $cart_data = $cart_data->groupBy(function ($item, $key) {
//     return $item->model->store->name;
// });

        $sub_total = Cart::subtotal();
        $total = Cart::priceTotal();
        return view('livewire.cart.table',compact('cart_data','total','sub_total'));
    }
}
