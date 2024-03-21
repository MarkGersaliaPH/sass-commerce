<?php

namespace App\Livewire\Checkout;

use App\Livewire\Forms\Address;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Guest extends Component
{ 


    #[Validate('required')] 
    public $name;
    
    #[Validate('required')] 
    public $contact_no;
    
 

    public function render()
    {
        return view('livewire.checkout.guest');
    }

    public function submit()
    { 
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
  
    }
}
