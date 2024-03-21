<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class AddToCart extends Component
{

    public $id;

    public $qty = 1;
    
 
    public function mount($id){
        $this->id = $id;
    }

    public function increase(){
        $this->qty = $this->qty + 1;
    }
    public function decrease(){
        $this->qty = $this->qty -1;
    }
    public function save(){ 
        // dd($this->id,$this->qty);
        $product = Product::find($this->id);
        $price = $product->getFinalPriceAttribute(); 
        Cart::add($product->id, $product->name, $this->qty, $price)->associate(Product::class); 
        $this->dispatch('cart_updated');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
