<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = Product::with('store')->find($id);
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
