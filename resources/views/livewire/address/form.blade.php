<div>
    <div class="row mb-2">
        <div class="form-group col {{ $errors->has('region_id') }}">
            <label>Region:</label>
            <select wire:model="region_id" wire:change="onSelectRegion" name="region_id" id="region_id" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($regions as $region)
                    <option value="{{$region->region_id}}">{{$region->name}}</option>
                @endforeach
            </select>
        </div>
        <div  class="form-group col {{ $errors->has('province_id') }}">
            <label>Province:</label>
            <select wire:model="province_id" wire:change="onSelectProvince" name="province_id" id="" class="form-control" readonly="true">
                <option value="" default>-- Select --</option>
                @foreach ($provinces as $province)
                <option value="{{$province->province_id}}">{{$province->name}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group  mb-2 {{ $errors->has('city_id') }}">
        <label>City:</label>
        <select wire:model="city_id" wire:change="onSelectCity" name="city_id" id="" class="form-control" readonly="true">
            <option value="" default>-- Select --</option> 
            @foreach ($cities as $city)
            <option value="{{$city->city_id}}">{{$city->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group  mb-2 {{ $errors->has('barangay_id') }}">
        <label>Barangay:</label> 
        <select wire:model="barangay_id" name="barangay_id" id="" class="form-control"  >
            @foreach ($barangays as $barangay)
            <option value="{{$barangay->id}}">{{$barangay->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group  mb-2 {{ $errors->has('street') }}">
        <label>Street:</label>
        <input type="text" class="form-control"  >
        {{ $errors->first('street') }}
    </div>
</div>
@push('scripts')
    <script>
        $('#region_id').on('change', function() {
            $.getJSON('{{ config('address.prefix') }}/provinces/' + this.value, function(data) {
                var options = '';
                $.each(data, function(index, data) {
                    var selected = '';
                    if (data.province_id == address.province) {
                        selected = ' selected ';
                    }
                    options += '<option value="' + data.province_id + '"' + selected + '>' + data
                        .name + '</option>';
                });
                $('#province_id').html(options);
                $('#province_id').change();
            });
        });
    </script>
@endpush
