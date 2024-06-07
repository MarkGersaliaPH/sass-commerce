@component('mail::message')
# Thank you for your order!

Your order has been successfully created.

## Order Information

- **Transaction ID:** {{ $transaction->order_transaction_id }}
- **Order Date:** {{ $transaction->created_at->toFormattedDateString() }}

## Order Details

@foreach ($transaction->orders as $order)
### Seller: {{ $order->store->name }} Order ID ({{$order->order_id}}) 
@foreach ($order->orderItems as $item)
- **{{ $item->product->name }}** (x{{ $item->qty }}) - PHP{{ number_format($item->unit_price, 2) }}
@endforeach

@endforeach

## Total

- **Subtotal:** PHP{{ number_format($transaction->total_amount - $transaction->shipping_fee, 2) }}
- **Shipping Fee:** PHP{{ number_format($transaction->shipping_fee, 2) }}
- **Total Amount:** PHP{{ number_format($transaction->total_amount, 2) }}

We will notify you when each seller updates the status of your items.

Thanks,  
{{ config('app.name') }}

@endcomponent
