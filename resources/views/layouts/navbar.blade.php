<nav class="navbar navbar-expand-lg navbar-light bg-light bg-gradient fixed-top shadow" >
    <div class="container-fluid px-0"><a class="navbar-brand d-inline-flex" href="/"><img class="d-inline-block"
                src="{{ asset('template/assets/img/gallery/logo.svg') }}" alt="logo" /><span
                class="text-1000 fs-3 fw-bold ms-2 text-gradient">{{ config('app.name') }}</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">

            {{-- <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0"> --}}
            <a href="{{ route('filament.customer.auth.login') }}" class="nav-link rounded ms-auto"
                type="submit"> <i class="fas fa-user me-2"></i>Login</a> 
            <div>
                <a href="{{ route('cart') }}" class="nav-link text-danger  position-relative">
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
