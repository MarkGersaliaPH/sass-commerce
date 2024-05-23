<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{

    public $categories;
    public $sort_options;
    public $sort;
    public function mount()
    {
        $this->categories = Category::all();
        $this->sort_options = $this->getSortOptions();
    }
    public $keyword = '';
    public $category_id = '';
    public function render()
    {
        $products = Product::when($this->keyword, function ($q) {
            return $q->where('name', 'LIKE', '%' . $this->keyword . '%');
        })->when($this->category_id, function ($q) {
            return $q->where('category_id', $this->category_id);
        });

        if ($this->sort) {
            $products = $products->orderBy($this->sortData($this->sort)[0], $this->sortData($this->sort)[1]);
        }

        return view('livewire.shop', ['products' => $products->get()]);
    }

    public function sortData($key)
    {
        $result = [];
        switch ($key) {

            case 2:
                return ['name', 'asc'];
                break;
            case 3:
                return ['price', 'desc'];
                break;
            case 4:
                return ['price', 'asc'];
                break;

            default:
                # code...
                return ['name', 'asc'];
                break;
        }
 
    }

    public function getSortOptions()
    {
        return [
            1 => "A to Z",
            2 => "Z to A",
            3 => "Price High to Low",
            4 => "Price Low to High",
        ];
    }
}
