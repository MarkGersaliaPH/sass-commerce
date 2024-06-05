@component('mail::message')
# Your Order is Complete!

We are pleased to inform you that your order has been successfully completed.

**Order ID:** {{ $order->order_id }}

**Order Date:** {{ $order->created_at->toFormattedDateString() }}

{{-- **Delivery Date:** {{ $order->delivery_date->toFormattedDateString() }} --}}



**Shipping Address:**
{{ $order->shipping_address_display }}
 
**Items Ordered:**
@foreach ($order->orderItems as $item)
- **{{ $item->product->name }}** (x{{ $item->qty }}) - PHP{{ number_format($item->unit_price, 2) }}
@endforeach
 

**Total Amount:** PHP{{ number_format($order->total_amount, 2) }}

We hope you enjoy your purchase. If you have any questions or need further assistance, please don't hesitate to contact us.
 
Thank you for shopping with us!

Best regards,<br>
{{ config('app.name') }}
@endcomponent