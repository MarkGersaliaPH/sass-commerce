<?php

namespace App\Livewire\Cart;

use App\CustomCart;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderSummary extends Component
{

    #[On('cart_updated')]
    public function render()
    {
        $data['sub_total'] = CustomCart::subtotal();
        $data['total'] = (new CustomCart)->totalWithShippingFee(); 
        $data['shipping_fee'] = CustomCart::shipping_fee();
        $data['tax'] = CustomCart::tax();
        return view('livewire.cart.order-summary',$data);
    }
}
