@extends('layouts.front')
@section('content') 
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0 overflow-hidden">
 
        @livewire('latest-discounted-products')

        @livewire('product-list') 

        @livewire('featured-stores')

    </section>





    <section class="py-0">
        <div class="bg-holder"
            style="background-image:url({{ asset('template/assets/img/gallery/cta-two-bg.png') }});background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row flex-center">
                <div class="col-xxl-9 py-7 text-center">
                    <h1 class="fw-bold mb-4 text-white fs-6">Are you ready to order <br />with the best deals? </h1><a
                        class="btn btn-danger" href="{{route('shop')}}"> PROCEED TO ORDER<i class="fas fa-chevron-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

 
@endsection
