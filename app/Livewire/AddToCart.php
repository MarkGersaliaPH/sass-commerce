<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class AddToCart extends Component
{

    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function add($id){ 
        $product = Product::find($id);
        Cart::add($product->id, $product->name, 1, $product->price);
        $this->dispatch('cart_updated',['product'=>$product]);
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
