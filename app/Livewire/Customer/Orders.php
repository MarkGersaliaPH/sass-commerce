<?php

namespace App\Livewire\Customer;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Orders extends Component
{
    public $title = 'Orders';

    public function mount()
    {
        $this->title = 'Orders';
    }

    #[Layout('customers.layout')]
    public function render()
    {
        $orders = Order::with('orderItems', 'shipping_details')->where('user_id', auth()->id())->get();

        return view('livewire.customer.orders', compact('orders'));
    }
}
