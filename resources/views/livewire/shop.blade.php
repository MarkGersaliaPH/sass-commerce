<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li> 
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>


    <div class=" mb-3 d-flex gap-2">
        <div class="form-group"> 
            <input wire:model.live="keyword" class="form-control" placeholder="Search via keyword Ex: Burgers...">

        </div>

        <div class="form-group me-auto"> 
            <select wire:model.live="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group"> 
            <select wire:model.live="sort" class="form-control">
                <option value="">Sort options</option>
                @foreach ($sort_options as $key=> $sort)
                    <option value="{{ $key }}">{{ $sort }}</option>
                @endforeach
            </select>

        </div>
    </div>
  

    <div class="my-5" wire:loading.block>
        @include('components.spinner')
    </div>
    <div wire:loading.remove class="row g-3 ">
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
