<div>
    <div>
        <div class="container my-4">

            <div class="col-lg-7 mx-auto text-center mb-5">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Latest Products</h5>
            </div>

            <div class="row gx-2">
                @foreach ($products as $product)
                    <div class="col-6 col-sm-6 col-lg-4  col-md-4 mb-5">
                        @include('products.single')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
