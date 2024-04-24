<?php

namespace App\Livewire\Customer;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Address extends Component
{
    #[Layout('customers.layout')]
    public function render()
    {
        return view('livewire.customer.address');
    }
}
