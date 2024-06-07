@component('mail::message')
# Order Cancelled
 
We regret to inform you that your order **#{{ $order->order_id }}** has been cancelled.

## Order Details
- **Order Number:** {{ $order->order_id }}
- **Order Date:** {{ $order->created_at->format('F d, Y') }}
- **Total Amount:** ${{ number_format($order->total_amount, 2) }}

## Items Ordered:
@foreach ($order->orderItems as $item)
- **{{ $item->product->name }}** (x{{ $item->qty }}) - PHP{{ number_format($item->unit_price, 2) }}
@endforeach
 
If you have any questions or need further assistance, please feel free to contact our support team.
 

Thank you for understanding.

Best regards,  
{{ config('app.name') }} 
@endcomponent