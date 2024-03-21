<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Cart</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8">
                    @livewire('cart.table')
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @livewire('cart.order-summary')
                            <a href="{{route('checkout')}}" class="btn btn-danger py-2 d-block">Procceed to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="mt-3">

        @livewire('popular-items')
    </div>
</div>
