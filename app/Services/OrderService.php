<?php

namespace App\Services;

use App\CustomCart;
use App\Enums\OrderStatus;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function saveOrder($addressFormData)
    {
        $cart_data = CustomCart::content();
 
        // Group the items by 'store_id'
        $groupped = $cart_data->groupBy(function ($item, $key) {
            return $item->model->store->id;
        });



        foreach ($groupped as $store_id => $cartItems) {

            $orderTotal = 0;
            $tax = 0;
            $subTotal = 0;

            

            $shipping_fee = $groupped->count() >= 2 ? config('shipping_fee', 40) / 2 :  config('shipping_fee', 40);
 
            $order = Order::create(
                [
                    'user_id' => Auth::check() ? auth()->id() : null,
                    'order_id' => '',
                    'store_id' => $store_id,
                    'total_amount' => $orderTotal,
                    'tax' => $tax,
                    'sub_total' => $subTotal,
                    'status' => OrderStatus::New,
                    'shipping_fee' => $shipping_fee,
                    'payment_method' => 1,
                    'guest_checkout' => Auth::check() ? 1 : 0,
                ]
            );

            foreach ($cartItems as $cartItem) {

                $orderTotal += $cartItem->priceTotal;
                $subTotal += $cartItem->subtotal;
                $tax += $this->calculateTax($cartItem->price);
                $order->orderItems()->create([
                    'product_id' => $cartItem->id,
                    'qty' => $cartItem->qty,
                    'unit_price' => $cartItem->price,
                ]);
            }

            $order->sub_total = $orderTotal;
            $order->tax = $tax;
            $order->total_amount = $subTotal + $shipping_fee + $tax;
            $order->order_id = $this->generateOrderId($order);
            $order->save();

            $order->shipping_details()->create($addressFormData->all());

        }

        $order->transaction_id = $this->generateTransactionId($order);

        CustomCart::destroy();

    }

    public function calculateTax($price)
    {
        // Define the tax rate (12%)
        $taxRate = 12;

        // Calculate the total price
        $totalPrice = $price;

        // Calculate the tax amount
        $taxAmount = ($taxRate / 100) * $totalPrice;

        // Return the tax amount
        return $taxAmount;
    }

    private function generateOrderId($order)
    {
        // Get the current date in the format YYYYMMDD
        $date = Carbon::now()->format('Ymd');

        // Generate the new order ID
        $orderID = 'O-'.$date.'-'.$order->id;

        return $orderID;
    }

    private function generateTransactionId($order)
    {
        // Get the current date in the format YYYYMMDD
        $date = Carbon::now()->format('Ymd');

        // Generate the new order ID
        $orderID = 'T-'.$date;

        return $orderID;
    }
}
