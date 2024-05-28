<?php

namespace App\Alerts;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait Alerts
{

    use LivewireAlert;

    public function getListeners()
    {
        return [
            'continue_shopping',
            'redirect_to_cart',
        ];
    }

    
    public function continue_shopping()
    {
        return redirect()->back();
    }
    public function redirect_to_cart()
    {
        return redirect(route("cart"));
    }

    public function getAddToCartAlert()
    {
        
        $this->dispatch('cart_updated'); 
        return  $this->alert(
            'success',
            "Success",
            [
                "toast" => false,
                'type' => "success",
                'text' => "Item successfullly added to cart, Continue shopping or proceed to checkout",
                'position' => 'center',
                'allowOutsideClick' => false,
                'timer' => null,


                'showConfirmButton' => true,
                'confirmButtonText' => 'Go to cart',
                'onConfirmed' => 'redirect_to_cart',

                'showCancelButton' => true,
                'cancelButtonText' => 'Continue Shopping',
                'onDismissed' => 'continue_shopping',
                "customClass"=>[
                    'confirmButton' => 'bg-danger',
                    'cancelButton' => 'bg-warning',
                    'title'=>'text-gradient'
                ]
            ]
        );
    }
}
