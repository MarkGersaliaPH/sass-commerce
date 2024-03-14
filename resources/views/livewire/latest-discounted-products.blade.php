<div>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0">

        <div class="container">
            <div class="row h-100 gx-2 mt-7">
                @foreach ($products as $product)
                    
                <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                    <div class="card card-span h-100">
                        <div class="position-relative">   
                            <div class="img-fluid card-img-top rounded-3 single-product-image" style="background-image:url({{$product->image}})">
                        
                            </div> 
                            <div class="card-actions">
                                <div class="badge badge-foodwagon bg-primary p-4">
                                    <div class="d-flex flex-between-center">
                                        <div class="text-white fs-7">{{$product->discount_percentage}}</div>
                                        <div class="d-block text-white fs-2">% <br />
                                            <div class="fw-normal fs-1 mt-2">Off</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-1000 text-truncate">{{$product->name}}</h5> 
                            <div class="d-flex"><h6 class="text-1000 fw-bold">{!! $product->display_price !!}</h6></div>
                            
                            <span
                                class="badge bg-soft-danger py-2 px-3"><span class="fs-1 text-danger">{{$product->category->name}}</span></span>
                        </div><a class="stretched-link" href="#"></a>
                    </div>
                </div>
                @endforeach 
            </div>
        </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

</div>
