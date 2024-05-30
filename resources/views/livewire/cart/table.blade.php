<div>

    <div class="my-4">
    @foreach ($cart_data as $cart)

        <div class="d-flex mb-3  gap-2 align-items-center ">
            
            <i class="fa fa-times text-danger me-2" wire:click="remove('{{ $cart->rowId }}')"></i>

            <div class="flex">
                <img src="{{ $cart->model->image }}" alt="" width="80" class="img-fluid rounded" />
            </div>
            <div class="flex-fill  "> 
                <h5 class="mb-0 ">
                    <a href="{{ route('product.detail', $cart->model->id) }}" class="text-dark ">{{ $cart->name }}</a>
                </h5>
                <span class="">
                    {!! $cart->model->display_price !!} </span>
            </div>
            <div class="d-flex flex-column   align-items-center">
                <i class="fa fa-caret-up" wire:click="increase('{{ $cart->rowId }}')"></i>
                <input type="text" value=" {{ $cart->qty }}" style="width: 30px" class=" py-1">
                <i class="fa fa-caret-down" wire:click="decrease('{{ $cart->rowId }}')"></i>
            </div>
        </div>
    @endforeach
</div>

{{-- 

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
                    <div class="py-2 text-uppercase">Remove</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_data as $cart)
                <tr>
                    <td scope="row" class="border-0">
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
                    </td>
                    <td class="border-0 align-middle"><strong>{!! $cart->price !!}</strong>
                    </td> 
                    <td class="border-0 align-middle" style="width: 160px">
                      
                        <div class="d-flex align-middle align-items-center justify-content-center">
                            <a href="#" class="text-danger flex-fill align-self-center cursor-pointer d-block"
                                wire:click="decrease('{{ $cart->rowId }}')">
                                <i class="fa fa-minus cursor-pointer"></i>
                            </a>
                            <div class="flex-fill align-self-center">
                                {{ $cart->qty }}
                            </div>
                            <a href="#" class="text-danger flex-fill align-self-center cursor-pointer d-block"
                                wire:click="increase('{{ $cart->rowId }}')">
                                <i class="fa fa-plus"></i>
                            </a> 
                        </div>
                    </td> 
                    <td class="border-0 align-middle">

                        <span wire:click="remove('{{ $cart->rowId }}')">
                            <i class="fa fa-trash  text-danger"></i></span>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</div> --}}
