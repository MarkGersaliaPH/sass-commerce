 <div class="card card-span rounded-3">
     <div class="img-fluid card-img-top rounded-3 single-product-image"
         style="background-image:url({{ $product->image }})">

     </div>
     <div class="card-img-overlay ps-0">
        @if ($product->discount_percentage) 
        <span class="badge bg-danger p-2 ms-3 shadow">
            <i class="fas fa-tag me-2 fs-0"></i><span class="fs-0">{{$product->discount_percentage}}% off</span>
        </span>
        @endif
        @if ($product->display_preparation_time )
            
        <span class="badge bg-primary ms-2 me-1 p-2 shadow">
            <i class="fas fa-clock me-1 fs-0"></i>
            <span class="fs-0">{{$product->display_preparation_time }}</span>
        </span>
        @endif
     </div>
     {{-- <img class="img-fluid card-img-top rounded-3" src="" style="height: 200px" alt="..." /> --}}
     <div class="card-body ps-0">
         <h5 class="fw-bold text-1000 text-truncate mb-1">{{ $product->name }}</h5>
         <h6 class="text-danger   text-truncate mb-1">{{ $product->category->name }}</h6>

         <div class="d-flex justify-content-between">

             <div>
                 <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                 <span class="text-primary">{{ $product->store->address }}</span>
             </div> 
         </div>
         <span class="text-1000 fw-bold">{!! $product->display_price !!}</span>
     </div>
 </div>
 <div class="d-grid gap-2">

     <button class="btn btn-lg btn-danger" @click="$dispatch('productSelected',{id:{{ $product->id }}})">Order
         Now</button>
     {{-- <a class="btn btn-lg btn-danger" href="{{route('product.detail',$product->id)}}">Order Now</a> --}}

     {{-- @livewire('add-to-cart',['id'=>$product->id]) --}}
 </div>
