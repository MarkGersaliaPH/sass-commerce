<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddressForm extends Form
{
    //
     
    public $region_id = 13;
    public $province_id = 1374;
    public $city_id = 137401;

    
    #[Validate('required')] 
    public $barangay_id; 

    
    #[Validate('required')] 
    public $street; 
    
    public function store() 
    {
        dd($this->validate());
 
        // Post::create($this->all());
    }

}
