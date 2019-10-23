<div class="row align-items-center mb-4">
    <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
        <label for="{{ $parameter['type'] }}" class="h2 visaCalcForm__label font-weight-normal m-0 user-select-none">{{ $parameter['label_checkout'] }}</label>
    </div>
    <div class="col-7 col-sm-4 col-md-4 col-lg-3 col-xxl-2 col-xxxl-2 mt-2 mt-sm-0">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-primary btn--rounded px-3 px-xl-4 btn-number" disabled="disabled" data-type="minus" data-field="parameter_regular[{{ $parameter['type'] }}]"><em class="fas fa-minus"></em></button>
            </div>
            <input
            type="text"
            name="parameter_regular[{{ $parameter['type'] }}]"
            value="{{ old("parameter_regular.{$parameter['type']}", $parameter['value']) }}"
            id="{{ $parameter['type'] }}"
            min="0"
            max="100"
            step="1"
            class="textInput--quantity form-control border-primary text-center input-number"
            placeholder="Кол-во"
            required
            >
            <div class="input-group-append">
                <button class="btn btn-primary btn--rounded px-3 px-xl-4 btn-number" data-type="plus" data-field="parameter_regular[{{ $parameter['type'] }}]"><em class="fas fa-plus"></em></button>
            </div>
        </div>
    </div>
</div>
