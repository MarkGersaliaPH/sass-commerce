<div>
    
    <div class="card checkout-order-summary">
        <div class="card-body">
            <div class="p-3 bg-light mb-3">
                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
            </div>
            <div class="table-responsive">
                <table class="table table-centered mb-0 table-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0"  scope="col"></th>
                            <th class="border-top-0" scope="col">Product Desc</th>
                            <th class="border-top-0" scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_data as $cart)
                            
                        <tr>
                            <th scope="row"><img src="{{$cart->model->image}}" alt="product-img" title="product-img" class="avatar-sm rounded"></th>
                            <td>
                                <h5 class="font-size-16 mb-0 text-truncate"><a href="#" class="text-dark">{{$cart->name}}</a></h5>
                               
                                <p class="text-muted mb-0 mt-1">{{$cart->model->display_price}} x 2</p>
                            </td>
                            <td>P{{$cart->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
