@if (count($parameter->enabledValues))
<div class="col-10 col-sm-12 col-lg-6">
    <div class="row align-items-center vpm__mt">
        <div class="col-12 col-xxl-5 {{ ($k%2 != 0) ? 'text-xxl-right' : ''}}">
            <label for="parameter_{{ $parameter->id }}" class="h4 mb-0 font-weight-normal">{{ $parameter->calculator_label }}</label>
        </div>
        <div class="col-12 col-lg-12 col-xxl-7 mt-2 mt-xl-3 mt-xxl-0">
            <div class="radioButtons row">
                @foreach ($parameter->enabledValues as $value)
                <div class="col-12 col-sm-6">
                    <div class="radioButtons__item">
                        <input
                        type="radio"
                        name="parameter[{{ $parameter->id }}]"
                        value="{{ $value->id }}"
                        id="value_{{ $value->id }}"
                        class="d-none"
                        @if ((bool)$value->is_default)
                            checked="checked"
                        @endif
                        />
                        <label for="value_{{ $value->id }}" class="radioButtons__label btn btn-outline-primary border border-primary mb-0">{{ $value->calculator_label }}</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
