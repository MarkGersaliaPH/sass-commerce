<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductModal extends Component
{
    public $product;

    public $showModal;

    #[On('productSelected')]
    public function productSelected($id)
    {
        $this->product = Product::find($id);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}
