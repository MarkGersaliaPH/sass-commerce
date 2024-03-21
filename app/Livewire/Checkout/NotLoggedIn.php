<?php

namespace App\Livewire\Checkout;

use Livewire\Component;

class NotLoggedIn extends Component
{
    public function render()
    {
        return view('livewire.checkout.not-logged-in');
    }
}
