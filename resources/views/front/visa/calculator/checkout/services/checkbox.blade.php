<div class="row align-items-center mb-4">
    <div class="col-9 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
        <label for="{{ $parameter['type'] }}" class="h3 visaCalcForm__label font-weight-normal m-0 mt-2">{{ $parameter['label_checkout'] }}</label>
        @isset($parameter['label_helper']) <span class="text-sm d-block">{{ $parameter['label_helper'] }}</span> @endisset
    </div>
    <div class="col-3 col-sm-4 col-md-4 col-lg-3 col-xxl-3 col-xxxl-2 mt-2 mt-sm-0">
        <div class="custom-control custom-control--big-checks custom-checkbox custom-checkbox--big-checks">
            @foreach ($parameter['values_checkout'] as $value)

                @if ($loop->first)
                {{-- this is unchecked value --}}
                <input type="hidden" name="parameter_regular[{{ $parameter['type'] }}]" value="{{ $value['value'] }}">
                @endif

                @if ($loop->last)
                {{-- this is checked value --}}
                <input
                type="checkbox"
                name="parameter_regular[{{ $parameter['type'] }}]"
                value="{{ $value['value'] }}"
                id="{{ $parameter['type'] }}"
                @if(old("parameter_regular.{$parameter['type']}", ($data['parameter_regular'][$parameter['type']] ?? null)) == $value['value'])
                    checked
                @endif
                class="custom-control-input"
                >
                <label class="custom-control-label custom-control-label--big-checks h3 m-0 " for="{{ $parameter['type'] }}"></label>
                @endif

            @endforeach
        </div>
    </div>
</div>
