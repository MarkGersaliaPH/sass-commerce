
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="{{asset("template/assets/img/gallery/logo.svg")}}" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">foodwaGon</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">

              <p class="mb-0 fw-bold text-lg-center">Deliver to: <i class="fas fa-map-marker-alt text-warning mx-2"></i><span class="fw-normal">Current Location </span><span>Mirpur 1 Bus Stand, Dhaka</span></p>
            </div>
            {{-- <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0"> --}}
              <a href="{{route('login')}}" class="btn btn-white text-warning rounded" type="submit"> <i class="fas fa-user me-2"></i>Login</a>
              {{-- @livewire('cart-counter')
              @livewire('cart-clear') --}}
            {{-- </form> --}}
            
           <div >
            <a href="{{route('cart')}}" class="btn btn-white text-danger  position-relative">
                <span class="shop-bag"><i class='fa fa-shopping-bag me-2'></i></span> 
                Cart
                  <span class=" badge rounded-pill bg-danger">
                    @livewire('cart-counter')
                  </span>  
            </a>           
        </div>
          </div>
        </div>
      </nav>