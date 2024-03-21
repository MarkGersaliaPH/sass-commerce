<div class="table-responsive">
    <ul class="list-unstyled mb-4">
        @foreach ($cart_data as $cart) 
        <li class="d-flex justify-content-between align-items-center py-3 border-bottom">
            <div class="d-flex align-items-center gap-2"> 
            <img src="{{$cart->model->image}}" alt="product-img" title="product-img" class="avatar-sm rounded">    
                <span>
                    <div class="mb-0 fw-bold">{{$cart->name}}</div>
                    <div class="text-muted mb-0">{{number_format($cart->price,2)}} x {{$cart->qty}}</div> 
                </span>
            </div>
            <div class="fw-bold">
                {{number_format($cart->priceTotal,2)}}
            </div>
        </li>
        @endforeach
    </ul> 
</div>