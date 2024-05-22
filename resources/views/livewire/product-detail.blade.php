<div>
    <div class="container mt-5 pb-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">{{ $product->category->name }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-7">
                <img src="{{ $product->image }}" alt="" class="img-fluid w-100 mb-4 rounded-3">

            </div>
            <div class="col-md-5">
                <h6 class="   fw-light text-muted text-truncate mb-1">{{ $product->category->name }}</h6>

                <h1 class=" fw-normal mb-1">{{ $product->name }}</h1>
                <div class="price"><span class="mr-2">

                        <h4 class="fw-light">{!! $product->display_price !!}</h4>
                        @if ($product->discount_percentage)
                            <small class="badge bg-danger  fw-normal text-sm">
                                <i class="fas fa-tag me-2 fs-0"></i><span
                                    class="fs-0">{{ $product->discount_percentage }}% off</span>
                            </small>
                        @endif
                        @if ($product->display_preparation_time)
                            <small class="badge  text-dark border   fw-normal text-sm">
                                <i class="fas fa-clock me-1 fs-0"></i>
                                <span class="fs-0">{{ $product->display_preparation_time }}</span>
                            </small>
                        @endif
                        @if ($product->display_preparation_time)
                            <small class="badge text-dark border  fw-normal  text-sm">
                                <i class="fa fa-map me-1 fs-0"></i>
                                <span class="fs-0">{{ $product->store->address }}</span>
                            </small>
                        @endif
                        {{-- <div class="d-flex flex-row">
                <div class="icons mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i></div><span>1200 ratings &amp; 564
                    reviews</span>
            </div> --}}
                        <div class="mt-2">
                            {!! $product->description !!}
                        </div>
<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->

                        {{-- <div class="card card-body">

                            <h5>Sold By:</h5>
                            <div class="d-flex align-items-center mb-3">
                                <img class="img-fluid store-logo" src="{{ $product->store->avatar_url }}"
                                    alt="" />
                                <div class="flex-1 ms-3">
                                    <h5 class="mb-0 fw-bold text-1000">{{ $product->store->name }}</h5><span
                                        class="text-primary fs--1 me-1"><i class="fas fa-star"></i></span><span
                                        class="mb-0 text-primary">46</span>
                                </div>
                                <span class="badge bg-soft-success p-2"><span class="fw-bold fs-1 text-success">Opens
                                        Today</span></span>
                            </div>
                        </div> --}}
                        @livewire('add-to-cart', ['id' => $product->id])
                </div>
            </div>
        </div>
        @livewire('related-products', ['category_id' => $product->category_id])
    </div>
