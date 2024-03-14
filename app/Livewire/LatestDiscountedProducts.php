<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class LatestDiscountedProducts extends Component
{
    public function render()
    {
        $products = Product::with('category')->isDiscounted()->limit(4)->latest('updated_at')->get(); 
        return view('livewire.latest-discounted-products',['products'=>$products]);
    }
}
