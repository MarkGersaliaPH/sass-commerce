@extends('layouts.front')
@section('content')

<div class="mt-10 container text-center" style="height: 100vh">
<h1 class="text-gradient">Thank You for Your Order!</h1>
<p>Your order has been successfully placed. You will receive a confirmation email shortly with the details of your order.</p>

<p>If you have any questions, feel free to <a href="contact.html">contact our support team</a>.</p>
<a href="{{route('shop')}}" class="btn btn-danger">Continue Shopping</a>
</div>
@endsection