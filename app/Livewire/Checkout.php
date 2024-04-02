<?php

namespace App\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $region_id = 13;
    public $province_id = 1374;
    public $city_id = 137401;
    public $barangay_id;
    public $street;


    public function render()
    { 
        if(request()->has('guest')){
            return view('livewire.checkout.guest',compact('order'));
        }
        return view('livewire.checkout');
    }
}
