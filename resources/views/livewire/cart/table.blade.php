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
 

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light ">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light ">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light ">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light ">
                                            <div class="py-2 text-uppercase">Total</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light ">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_data as $cart)
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="{{ $cart->model->image }}" alt="" width="70"
                                                        class="img-fluid rounded shadow">
                                                    <div class="ms-3 d-inline-block align-middle">
                                                        <h5 class="mb-0 fw-normal"> <a href="#"
                                                                class="text-dark d-inline-block align-middle">{{ $cart->name }}</a>
                                                        </h5><span
                                                            class="text-muted fw-normal font-italic d-block">Category:
                                                            {{ $cart->model->category->name }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>{!! $cart->price !!}</strong>
                                            </td>
                                            <td class="border-0 align-middle " style="width: 160px">
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="text-danger cursor-pointer d-block"
                                                        wire:click="decrease('{{ $cart->rowId }}')">
                                                        <i class="fa fa-minus cursor-pointer"></i>
                                                    </a>
                                                    <div class="">
                                                        {{ $cart->qty }}
                                                    </div>
                                                    <a href="#" class="text-danger cursor-pointer d-block"
                                                        wire:click="increase('{{ $cart->rowId }}')">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                {{-- <div class="input-group">
                                            <button class="btn btn-sm btn-danger" type="button"
                                                wire:click="decrease('{{ $cart->rowId }}')" id="button-addon1"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text" readonly wire:model="qty" class="form-control px-2"
                                                value="{{ $cart->qty }}" placeholder=""
                                                aria-label="Example text with button addon"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-danger btn-sm" type="button"
                                                wire:click="increase('{{ $cart->rowId }}')" id="button-addon1"><i
                                                    class="fa fa-plus"></i></button>
                                        </div> --}}
                                            </td>
                                            <td class="border-0 align-middle">
                                                P{{ $cart->total }}
                                            </td>
                                            <td class="border-0 align-middle">

                                                <span wire:click="remove('{{ $cart->rowId }}')">
                                                    <i class="fa fa-trash  text-danger"></i></span>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Order summary</h5>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="">Order Subtotal </strong><strong>{{ $sub_total }}</strong></li>
                                {{-- <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="">Shipping and handling</strong><strong>$10.00</strong></li>  --}}
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="">Total</strong>
                                    <h5 class="font-weight-bold">{{ $total }}</h5>
                                </li>
                            </ul><a href="{{route('checkout')}}" class="btn btn-danger py-2 d-block">Procceed to
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
