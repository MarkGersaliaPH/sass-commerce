<?php

namespace App\Livewire\Checkout;

use App\CustomCart;
use App\Enums\OrderStatus;
use App\Livewire\Forms\Address;
use App\Livewire\Forms\AddressForm;
use App\Livewire\Forms\CustomerForm;
use App\Models\Address as ModelsAddress;
use App\Models\Guest as ModelsGuest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

        $this->form->validate();
        $this->customer->validate();

        // Execution doesn't reach here if validation fails.
        $cart_data = CustomCart::content();
         // Group the items by 'store_id'
        $groupped = $cart_data->groupBy(function ($item, $key) {
            return $item->model->store->id;
        });

        dd($groupped);
        DB::beginTransaction();
        try {

            $guest = ModelsGuest::create(
                $this->customer->all()
            );

            foreach ($groupped as $store_id => $cartItems) {

                $orderTotal = 0;
                $tax = 0;
                $subTotal = 0;
 
                $order = $guest->orders()->create(
                    [
                        'order_id' => $this->generateOrderId(),
                        'store_id' => $store_id,
                        'total_amount' => $orderTotal,
                        'tax' => $tax,
                        'sub_total' => $subTotal,
                        'status' => OrderStatus::New,
                        'shipping_fee' => 40,
                        'payment_method' => 1,
                        'guest_checkout' => 1,
                    ]
                );


                foreach ($cartItems as $cartItem) {

                    dd($cartItem->tax);
                    $orderTotal += $cartItem->priceTotal;
                    $order->orderItems()->create([
                        'product_id' => $cartItem->id,
                        'qty' => $cartItem->qty,
                        'unit_price' => $cartItem->price
                    ]);


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
                $order->total_amount = $orderTotal;
                $order->save();
            }
            $this->form->save($order->id);
            DB::commit();

            // CustomCart::destroy();
            // return redirect("/");
            return back();
        } catch (\Exception $e) {

            dd($e);
            Log::error($e);

            DB::rollback();
            //throw $th;

        }
    }

    private function generateOrderId()
    {
        // Get the current date in the format YYYYMMDD
        $date = Carbon::now()->format('Ymd');

        // Get the last order ID from the database
        $lastOrder = Order::latest()->first();

        // Extract the numeric part of the last order ID and increment it by 1
        $lastID = $lastOrder ? intval(substr($lastOrder->id, strrpos($lastOrder->id, '-') + 1)) : 0;
        $newID = $lastID + 1;

        // Generate the new order ID
        $orderID = 'O-' . $date . '-' . sprintf('%04d', $newID);

        return $orderID;
    }
}
