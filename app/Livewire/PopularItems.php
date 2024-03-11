<?php

namespace App\Livewire;

use Livewire\Component;

class PopularItems extends Component
{

    public $selectedProduct;
 
    public function showModal($selectedProduct){ 
        // $this->selectedProduct = $selectedProduct; 
    }
    public function render()
    {  
        $products = \App\Models\Product::with('store')->isEnabled()->latest()->get();
        return view('livewire.popular-items',['products'=> $products]);
    }
}
