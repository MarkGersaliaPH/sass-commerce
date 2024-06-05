@component('mail::message')
# Your Order is Processing!

Thank you for your purchase. We are currently processing your order.

**Order ID:** {{ $order->order_id }}

**Order Date:** {{ $order->created_at->toFormattedDateString() }}
 

**Shipping Address:**
{{ $order->shipping_address_display }}

**Items Ordered:**
@foreach ($order->orderItems as $item)
- **{{ $item->product->name }}** (x{{ $item->qty }}) - PHP{{ number_format($item->unit_price, 2) }}
@endforeach
 
**Total Amount:** PHP{{ number_format($order->total_amount, 2) }}

We will notify you once your order is shipped.
 
Thank you for shopping with us!

Thanks,<br>
{{ config('app.name') }} 
@endcomponent