<div class="bg-primary-gradient">
    <section id="testimonial">
        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3 text-danger text-gradient">Featured Stores</h5>
            </div>
          </div>
          <div class="row gx-2 mx-auto d-flex justify-content-center">
            @foreach ($stores as $store)
                
            <div class="col-md-4 col-sm-6 h-100 mb-5">
                <div class="card card-span h-100 text-white border rounded-3">
                    <div class="img-fluid card-img-top rounded-3 single-product-image" style="background-image:url({{$store->products->first()->image}})"></div> 
                  
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3"><img class="img-fluid store-logo" src="{{$store->avatar_url}}" alt="" />
                      <div class="flex-1 ms-3">
                        <h5 class="mb-0 fw-bold text-1000">{{$store->name}}</h5><span class="text-primary fs--1 me-1"><i class="fas fa-star"></i></span><span class="mb-0 text-primary">46</span>
                      </div>
                    </div>
                    @if ($store->is_open)
                    <span class="badge bg-soft-success p-2"><span class="fw-bold fs-1 text-success">Opens Today</span>                        
                    @else
                    <span class="badge bg-soft-danger p-2"><span class="fw-bold fs-1 text-danger">Close Today</span>
                    @endif
                  </span>
                  </div>
                </div>
              </div> 
            @endforeach
            <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-primary" href="#!">View All <i class="fas fa-chevron-right ms-2"> </i></a></div>
          </div>
        </div>
      </section>

</div>
