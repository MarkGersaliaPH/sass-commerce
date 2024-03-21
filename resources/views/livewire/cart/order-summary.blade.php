<div>
    <ul class="list-unstyled mb-4">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="">Order Subtotal
            </strong><strong>{{ $sub_total }}</strong></li>
        <li class="d-flex justify-content-between py-3 border-bottom">
            <strong class="">Tax</strong><strong>{{ $tax }}</strong>
        </li>
        <li class="d-flex justify-content-between py-3 border-bottom">
            <strong class="">Shipping Fee</strong><strong>{{ $shipping_fee }}</strong>
        </li>
        <li class="d-flex justify-content-between py-3"><strong class="">Total</strong>
            <h5 class="font-weight-bold">{{ $total }}</h5>
        </li>
    </ul>
</div>
