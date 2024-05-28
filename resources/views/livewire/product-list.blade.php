<div>
    <div>
        <div class="container my-4">

            <div class="col-lg-7 mx-auto text-center mb-5">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-gradient">Latest Products</h5>
            </div>

            <div class="row g-2 equal">
                @foreach ($products as $product)
                    <div class="col-6 col-sm-6 col-lg-4  col-md-4">
                        @include('products.single')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
