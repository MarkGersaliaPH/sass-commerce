<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShowPosts extends Component
{

    public $count = 0;
 
    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
    public function render()
    {
        $products = Product::All();
        return view('livewire.show-posts',['products'=> $products]);
    }
}
