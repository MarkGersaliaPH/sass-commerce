<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class RelatedProducts extends Component
{
    public $category_id;

    public function mount($category_id)
    {
        $this->category_id = $category_id;
    }

    public function render()
    {
        $products = Product::with('category')->where('category_id', $this->category_id)->get();

        return view('livewire.related-products', ['products' => $products]);
    }
}
