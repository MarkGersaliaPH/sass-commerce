 
  <div class="card card-span h-100 rounded-3">  
    <div class="img-fluid card-img-top rounded-3 single-product-image" style="background-image:url({{$product->image}})">

    </div>
    {{-- <img class="img-fluid card-img-top rounded-3" src="" style="height: 200px" alt="..." /> --}}
    <div class="card-body ps-0">
        <h5 class="fw-bold text-1000 text-truncate mb-1">{{$product->name}}</h5>
        
        <div>
            <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
            <span class="text-primary">{{$product->store->address}}</span>
        </div>
        <span class="text-1000 fw-bold">{{$product->display_price}}</span>
    </div>
</div>
<div class="d-grid gap-2">
    {{-- <button class="btn btn-lg btn-danger" :selectedProduct="$product" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#!" role="button"
    >Order Now</button>  --}}
    <a class="btn btn-lg btn-danger" href="{{route('product.detail',$product->id)}}">Order Now</a>

    {{-- @livewire('add-to-cart',['id'=>$product->id]) --}}
</div>