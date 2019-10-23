@if (count($parameter->enabledValues))

<div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
    <div class="section-heading__name h4 m-0">{{ $parameter->checkout_title }}@if ($parameter->required) <span class="text-danger">*</span> @endif</div>
    @isset($parameter->description)
        <div class="ml-4">
            <span
            class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle"
            role="button"
            tabindex="0"
            data-trigger="hover"
            data-container="body"
            data-toggle="popover"
            data-placement="top"
            data-content="{{ $parameter->description }}"
            >?</span>
        </div>
    @endisset
</div>
<div class="row mb-5">
    <div class="col-12">
        <div class="radioButtons row mt-1">
            @foreach ($parameter->enabledValues as $value)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 @if (!$loop->first) mt-2 mt-sm-0 @endif">
                    <div class="radioButtons__item">
                        <input
                        type="radio"
                        name="parameter[{{ $parameter->id }}]"
                        id="value_{{ $value->id }}"
                        class="d-none"
                        value="{{ $value->id }}"
                        @if ($parameter->valueIsChecked($value, $data))
                            checked
                        @endif
                        />
                        <label for="value_{{ $value->id }}" class="radioButtons__label btn btn-outline-primary btn-block btn--rounded px-0 border-primary mb-0 user-select-none">{{ $value->checkout_label }}</label>
                    </div>
                </div>
            @endforeach
        </div>
        @error('parameter.'.$parameter->id)
        <div class="row mt-1">
            <div class="col-12 col-md-4 col-lg-6 col-xxxl-4">
                <span class="invalid-feedback text-center d-block" role="message">{{ $message }}</span>
            </div>
        </div>
        @enderror
    </div>
</div>

@endif
