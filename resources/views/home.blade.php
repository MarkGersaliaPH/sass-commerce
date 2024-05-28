@extends('layouts.front')
@section('content')


@include('layouts.hero')
 
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0 overflow-hidden">

        @livewire('latest-discounted-products')

        @livewire('product-list')


        <section class="py-0 bg-danger">
            <!--/.bg-holder-->

            <div class="bg-holder"
            style="background-image:url({{ asset('template/assets/img/gallery/cta-two-bg.png') }});background-position:center;background-size:cover;">
        </div>
            <div class="container">
                <div class="row flex-center">
                    <div class="col-xxl-9 py-7 text-center">
                        <h1 class="fw-bold mb-4 text-white fs-6">
                            
                            Satisfy your cravings now! Order from our delectable selection
                        </h1><a
                            class="btn btn-danger" href="{{ route('shop') }}"> ORDER NOW<i
                                class="fas fa-chevron-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </section>

        @livewire('featured-stores')

    </section>
@endsection
