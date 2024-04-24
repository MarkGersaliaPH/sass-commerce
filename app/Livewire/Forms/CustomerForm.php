<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    //
    public $email;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $contact_no;
}
