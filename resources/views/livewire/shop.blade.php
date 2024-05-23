<div class="container">
    <div class="form-group mb-3 d-flex gap-2">
        <input wire:model.live="keyword" class="form-control" placeholder="Search Keyword"> 
        <select wire:model.live="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        
    </div>

    <div class="row g-3 ">
        @forelse ($products as $product)
            <div class="col-6 col-sm-6 col-lg-4  col-md-4">
                @include('products.single')
            </div>
        @empty
        <div class="p-4 text-center">
            No record 
        </div>
        @endforelse
    </div>
    {{-- Stop trying to control. --}}
</div>
