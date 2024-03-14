<?php

namespace App\Livewire;

use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $products = \App\Models\Product::with('store')->isEnabled()->latest()->get();
        return view('livewire.product-list',['products'=>$products]);
    }
}
