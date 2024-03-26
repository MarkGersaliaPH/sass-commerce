<?php

namespace App\Livewire\Checkout;

use App\CustomCart;
use App\Livewire\Forms\Address;
use App\Livewire\Forms\AddressForm;
use App\Livewire\Forms\CustomerForm;
use App\Models\Guest as ModelsGuest;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Guest extends Component
{

    public AddressForm $form;
    public CustomerForm $customer;

    public function render()
    {
        return view('livewire.checkout.guest', ['options' => $this->form->getOptions()]);
    }

    public function save()
    {

        // dd($this->form->all(),$this>customer->all()); 

 
        // Execution doesn't reach here if validation fails.
        $cart_data = CustomCart::content();

        // Group the items by 'store_id'
        $groupped = $cart_data->groupBy(function ($item, $key) {
            return $item->model->store->id;
        }); 

        \DB::beginTransaction();
        try { 
            foreach ($groupped as $store_id => $cartItems) {  
            
                foreach($cartItems as $cartItem){

                    $guest = ModelsGuest::create(
                        $this->customer->all()
                    );
  
                    $orders = ($guest->orders()->create([
                        [
                        'store_id'=>$store_id,
                        'total_amount'=>$cartItem->priceTotal,
                        'status'=>1,
                        'shipping_fee'=>40,
                        'payment_method'=>1,
                        'guest_checkout'=>1,
                        ]
                    ]));

                    dd($orders);


                //    $order =  Order::create(
                //         [
                //         'store_id'=>$store_id,
                //         'total_amount'=>$cartItem->priceTotal,
                //         'status'=>1,
                //         'shipping_fee'=>40,
                //         'payment_method'=>1,
                //         'guest_checkout'=>1,
                //         ]
                //     );
                    

                //     dd($order);
    
                //     $order->orderItems()->create([
                //         'product_id'=>$cartItem->id,
                //         'qty'=>$cartItem->qty,
                //         'unit_price'=>$cartItem->price
                //     ]);
     
                    
                //     $order->address()->create($this->form->all());
                    
                } 
               
            } 
        } catch (\Exception $e) {
            Log::error($e);

            \DB::rollback();
            //throw $th;
            
        }
    }
}
