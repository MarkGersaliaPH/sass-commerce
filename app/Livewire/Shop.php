<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{

    public $categories;
    public function mount(){
        $this->categories = Category::all();
    }
    public $keyword = '';  
    public $category_id = '';  
        public function render()
    { 
        $products = Product::when($this->keyword,function($q){
            return $q->where('name','LIKE','%'.$this->keyword.'%');
        })->when($this->category_id,function($q){
            return $q->where('category_id',$this->category_id);
        })->get();

        return view('livewire.shop',['products'=> $products]);
    }
}
