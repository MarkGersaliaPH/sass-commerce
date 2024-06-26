<div>
    <div class="row mb-2">
        <div class="form-group col ">
            <label>Region:</label>
            <select wire:model="region_id" wire:change="onSelectRegion" name="region_id" id="region_id" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($regions as $region)
                    <option value="{{$region->region_id}}">{{$region->name}}</option>
                @endforeach
            </select>
        </div>
        <div  class="form-group col ">
            <label>Province:</label>
            <select wire:model="province_id" wire:change="onSelectProvince" name="province_id" id="" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($provinces as $province)
                <option value="{{$province->province_id}}">{{$province->name}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group  mb-2  ">
        <label>City:</label>
        <select wire:model="city_id" wire:change="onSelectCity" name="city_id" id="" class="form-control" readonly="true">
            <option value="" default>-- Select --</option> 
            @foreach ($cities as $city)
            <option value="{{$city->city_id}}">{{$city->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group  mb-2  ">
        <label>Barangay:</label> 
        <select wire:model="barangay_id" name="barangay_id" id="" class="form-control"  >
            @foreach ($barangays as $barangay)
            <option value="{{$barangay->id}}">{{$barangay->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group  mb-2 ">
        <label>Street:</label>
        <input type="text" class="form-control"  > 
    </div>
</div> 