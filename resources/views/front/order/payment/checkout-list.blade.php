<div class="col-auto col-xxxl-auto mt-4 mt-lg-0">

    <div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3">
        <div class="section-heading__name @error('payment_method') text-danger @enderror h4 m-0">Выберите способ оплаты</div>
        @isset($description)
            <div class="ml-4">
                <span
                class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle"
                role="button"
                tabindex="0"
                data-trigger="hover"
                data-container="body"
                data-toggle="popover"
                data-html="true"
                data-placement="top"
                data-content="{{ $description }}"
                >?</span>
            </div>
        @endisset
    </div>

    <div class="wizard__pay-selector">

        <div class="d-inline-block border border-primary btn--rounded position-relative py-2 py-md-3 px-4 mb-2">
            <div class="d-flex align-items-center">
                <div>
                    <div class="custom-control custom-radio">
                        <input
                        type="radio"
                        name="payment_method"
                        value="{{ $default['value'] }}"
                        id="payment_method_{{ $default['value'] }}"
                        class="custom-control-input"
                        @if (old('payment_method', $default['value']) == $default['value'])
                            checked
                        @endif
                        >
                        <label class="custom-control-label custom-control-label--pay-radio m-0 cursor-pointer user-select-none" for="payment_method_{{ $default['value'] }}"></label>
                    </div>
                </div>
                <div class="ml-2 pt-1">
                    <label for="payment_method_{{ $default['value'] }}" class="h4 font-weight-light m-0 cursor-pointer user-select-none">
                        {!! $default['label'] !!}
                    </label>
                </div>
            </div>
        </div>

        @if (old('payment_method', $default['value']) == $default['value'])
            <span class="wizard__pay-spolier-toggle cursor-pointer mb-2 spoiler-toggle d-block">
                <u>Все способы оплаты</u>
            </span>
        @else
            <span class="wizard__pay-spolier-toggle cursor-pointer mb-2 spoiler-toggle d-none">
                <u>Все способы оплаты</u>
            </span>
        @endif

        @if (count($methods) > 0)

        <div class="wizard__pay-spolier-body spoiler-body @if (old('payment_method', $default['value']) == $default['value']) d-none @endif">

            @foreach ($methods as $method)

            <div class="d-inline-block border border-primary btn--rounded position-relative py-2 py-md-3 px-4 mb-2">
                <div class="d-flex align-items-center">
                    <div>
                        <div class="custom-control custom-radio">
                            <input
                            type="radio"
                            name="payment_method"
                            value="{{ $method['value'] }}"
                            id="payment_method_{{ $method['value'] }}"
                            class="custom-control-input"
                            @if (old('payment_method') == $method['value'])
                                checked
                            @endif
                            >
                            <label class="custom-control-label custom-control-label--pay-radio m-0 cursor-pointer user-select-none" for="payment_method_{{ $method['value'] }}"></label>
                        </div>
                    </div>
                    <div class="ml-2 pt-1">
                        <label for="payment_method_{{ $method['value'] }}" class="h4 font-weight-light m-0 cursor-pointer user-select-none">
                            {!! $method['label'] !!}
                        </label>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            @endforeach


        </div>

        @endif

        @error('payment_method')
            <span class="invalid-feedback d-block" role="message">{{ $message }}</span>
        @enderror

    </div>

</div>
