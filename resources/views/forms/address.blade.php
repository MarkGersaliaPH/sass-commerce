<div>
    <div class="form-group">
        <label>Name:</label>
        <input wire:model="form.name" required type="text" name="name" class="form-control">  
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div> 
    <div class="row mb-2">
        <div class="form-group col">
            <label>Contact No:</label>
            <input wire:model="form.contact_no" required type="number" name="contact_no" class="form-control">
            @error('contact_no') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group col">
            <label>Email:</label>
            <input wire:model="form.email" required type="email" name="email" class="form-control">
        </div> 
    </div>
    <div class="row mb-2">
      
        <div class="form-group col ">
            <label>Region:</label>
            <input type="text" class="form-control" disabled wire:model="form.region">
            {{-- <select wire:model="form.region" wire:change="onSelectRegion" name="region" id="region" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($options['regions'] as $region)
                    <option value="{{$region->name}}">{{$region->name}}</option>
                @endforeach
            </select> --}}
        </div>
        <div  class="form-group col ">
            <label>Province:</label>
            <input type="text" class="form-control" disabled wire:model="form.province">

            {{-- <select wire:model="form.province" wire:change="onSelectProvince" name="province" id="" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($options['provinces'] as $province)
                <option value="{{$province->name}}">{{$province->name}}</option>
            @endforeach
            </select> --}}
        </div>
    </div>

    <div class="form-group  mb-2  ">
        <label>City:</label>
        <input type="text" class="form-control" disabled wire:model="form.city">

        {{-- <select wire:model="form.city" wire:change="onSelectCity" name="city" id="" class="form-control" readonly="true">
            <option value="" default>-- Select --</option> 
            @foreach ($options['cities'] as $city)
            <option value="{{$city->name}}">{{$city->name}}</option>
        @endforeach
    </select> --}}
    </div>
    <div class="form-group  mb-2  ">
        <label>Barangay:</label> 
        <select wire:model="form.barangay"  required name="barangay" id="" class="form-control"  >
            @foreach ($options['barangays'] as $barangay)
            <option value="{{$barangay->name}}">{{$barangay->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group  mb-2 ">
        <label>Street:</label>
        <input type="text" class="form-control" required name="street" wire:model="form.street"  > 
        @error('form.street') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group  mb-2 ">
        <label>Address:</label>
        <input type="text" class="form-control" required wire:model="form.address"  > 
        @error('form.address') <span class="error">{{ $message }}</span> @enderror
    </div>
</div> 