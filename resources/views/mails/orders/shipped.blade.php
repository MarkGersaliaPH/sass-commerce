@component('mail::message')
# Order Shipped!
 
Hi {{ $order->shipping_details->name }},

Great news! Your order **#{{ $order->order_id }}** has been shipped and is on its way to you.

Here are the details:

- **Order Number:** {{ $order->order_id }}
- **Shipping Address:** {{ $order->shipping_address_display }} 

Thanks for your order!

Best regards,  
{{env("APP_NAME")}}
 
@endcomponent
