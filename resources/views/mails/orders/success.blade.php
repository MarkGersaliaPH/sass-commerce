<x-mail::message>
# Thank you for your order!
 
Your order has been successfully created.

**Order ID:** {{$transaction->order_transaction_id}}
 
**Total Amount:** {{ $transaction->total_amount }}

**Shipping Fee:** {{ $transaction->shipping_fee }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>