<div>
    <select wire:model="user_address_id" class="form-control">
        <option value="">Select</option>

        @foreach ($shippingDetailOptions as $key => $option)
            <option value={{ $option->id }}>{{ $option->title }} - {{$option->city}}</option>
        @endforeach
    </select>
</div>
