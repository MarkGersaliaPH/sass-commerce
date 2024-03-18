 <div>
     <div class="my-5">

         <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
             <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Related items</h5>
         </div>

         <div class="owl-carousel owl-theme">
             @foreach ($products as $product)
                 <div class="item h-100 border-e p-2">
                     @include('products.single')
                 </div>
             @endforeach
         </div>
     </div>
