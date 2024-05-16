<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserAddress;

class SelectShippingDetail extends Component
{
    public $shipping_id;
    public $selectShippingDetail;
    public $shippingDetailOptions;
    public $selectedOptions =[];

    public function mount(){ 
        $this->shippingDetailOptions = UserAddress::where('user_id',auth()->id())->get();
    }
 
     public function updated($name, $value) 
    { 

        $this->dispatch('address-selected',id:$value); 
    }
 

    public function render()
    {

        return view('livewire.select-shipping-detail');
    }
}
