<div class=""> 
    <div class="form-group">
        <label>Name:</label>
        <input wire:model="customer.name" type="text" name="name" class="form-control">  
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Contact No:</label>
            <input wire:model="customer.contact_no" type="number" name="contact_no" class="form-control">
            @error('contact_no') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label>Email:</label>
            <input wire:model="customer.email" type="email" name="email" class="form-control">
        </div>
    </div>
</div>
