<div>

    <div class="card checkout-order-summary">
        <div class="card-body">
            <h5 class="font-size-16 mb-4">Order Summary <span class="float-end ms-2">#MN0124</span></h5>

        </div>


        <div class="card-footer bg-white">

            <li class="d-flex justify-content-between "><strong class="">Order Subtotal
                </strong><strong>{{ $sub_total }}</strong></li>
            <li class="d-flex justify-content-between ">
                <strong class="">Tax</strong><strong>{{ $tax }}</strong>
            </li>
            <li class="d-flex justify-content-between ">
                <strong class="">Shipping Fee</strong><strong>{{ config('cart.shipping_fee') }}</strong>
            </li>
            <li class="d-flex justify-content-between"><strong class="">Total</strong>
                <h5 class="font-weight-bold">{{ $total }}</h5>
            </li>
        </div>
    </div>
</div>
