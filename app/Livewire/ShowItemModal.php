<?php

namespace App\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class ShowItemModal extends ModalComponent
{
    public Product $product;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.show-item-modal');
    }
}
