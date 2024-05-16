<div>
    @foreach ($shippingDetailOptions as $key => $option)
        <div>
            <input id="{{ $key }}" type="radio" style="display: inline-block" class="card-radio-input" name="myradio">
            <div class="card-radio">
                <label for="" class="card-radio-label">{{ $option->title }}</label>
                {{ $option->displayAddress() }}
            </div>
        </div>
    @endforeach
</div>
