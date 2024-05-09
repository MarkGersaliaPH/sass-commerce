 <div class="card card-span">
     <div class="img-fluid  rounded-top single-product-image"
         style="background-image:url({{ $product->image }})">

     </div>
     <div class="card-img-overlay ps-0">
        @if ($product->discount_percentage) 
        <small class="badge bg-dark fw-normal ms-3 shadow text-sm">
            <i class="fas fa-tag me-2 fs-0"></i><span class="fs-0">{{$product->discount_percentage}}% off</span>
        </small>
        @endif
        @if ($product->display_preparation_time )
            
        <small class="badge bg-dark fw-normal ms-2 me-1 shadow text-sm">
            <i class="fas fa-clock me-1 fs-0"></i>
            <span class="fs-0">{{$product->display_preparation_time }}</span>
        </small>
        @endif
     </div>
     {{-- <img class="img-fluid card-img-top rounded-3" src="" style="height: 200px" alt="..." /> --}}
     <div class="card-body ps-0">
         <h5 class="fw-normal text-1000 text-truncate mb-1">{{ $product->name }}</h5>
         <h6 class="text-muted fw-normal  text-truncate mb-1">{{ $product->category->name }}</h6>

         <div class="d-flex justify-content-between"> 
             <div>
                 <span class=""><i class="fas fa-map-marker-alt"></i></span>
                 <span class="">{{ $product->store->address }}</span>
             </div> 
         </div>
         <span class="text-1000 fw-bold">{!! $product->display_price !!}</span>
     </div>
 <a class="stretched-link"  href="{{ route('product.detail', $product->id) }}"></a>
     
 </div>
  
