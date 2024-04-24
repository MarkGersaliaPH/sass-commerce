<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCartModalTrigger extends Component
{
    public $product_id;

    public $product;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function onSelectProduct()
    {
        $this->dispatch('modal-open', ['product_id' => $this->product_id]);
    }

    public function render()
    {
        return view('livewire.add-to-cart-modal-trigger');
    }
}
