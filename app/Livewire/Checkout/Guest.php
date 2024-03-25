<?php

namespace App\Livewire\Checkout;

use App\Livewire\Forms\Address;
use App\Livewire\Forms\AddressForm;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Guest extends Component
{ 

    public AddressForm $form; 


    public function render()
    {

        return view('livewire.checkout.guest');
    }

    public function save()
    { 

        $this->form->store(); 
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
  
    }
}
