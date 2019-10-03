@extends('layouts.back.index')

@section('header', 'Новый параметр визы для страны "'.$visa->title.'"')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.parameter.store') }}">

    @csrf

    <input type="hidden" name="tabToGo" value="primary">
    <input type="hidden" name="visa_id" value="{{ $visa->id }}">

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#primary" role="tab" aria-controls="primary" aria-selected="true">
                        <em class="fas fa-home"></em>
                        <span class="d-none d-md-inline-block">Основное</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content px-3 py-4">
                <div class="tab-pane fade active show" id="primary" role="tabpanel" aria-labelledby="primary">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="title">Название <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="form-control @error('title')is-invalid @enderror"
                            id="title"
                            required
                            >
                            @error('title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="is_on_calculator_page">Есть на калькуляторе <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_on_calculator_page" value="0">
                                <input
                                type="checkbox"
                                name="is_on_calculator_page"
                                value="1"
                                class="custom-control-input"
                                id="is_on_calculator_page"
                                @if ((bool)old('is_on_calculator_page', false)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="is_on_calculator_page"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="calculator_title">Название в калькуляторе</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="calculator_title"
                            value="{{ old('calculator_title') }}"
                            class="form-control @error('calculator_title')is-invalid @enderror"
                            id="calculator_title"
                            >
                            @error('calculator_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="is_on_order_page">Есть на странице заказа <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_on_order_page" value="0">
                                <input
                                type="checkbox"
                                name="is_on_order_page"
                                value="1"
                                class="custom-control-input"
                                id="is_on_order_page"
                                @if ((bool)old('is_on_order_page', true)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="is_on_order_page"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="order_title">Название на странице заказа</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="order_title"
                            value="{{ old('order_title') }}"
                            class="form-control @error('order_title')is-invalid @enderror"
                            id="order_title"
                            >
                            @error('order_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Подсказка при заказе</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="description"
                            class="form-control @error('description')description @enderror"
                            id="description"
                            rows="4"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="required">Обязательный <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="required" value="0">
                                <input
                                type="checkbox"
                                name="required"
                                value="1"
                                class="custom-control-input"
                                id="required"
                                @if ((bool)old('required', true)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="required"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="ordering"
                            value="{{ old('ordering', 50) }}"
                            class="form-control @error('ordering')is-invalid @enderror"
                            id="ordering"
                            required
                            min="0"
                            step="1"
                            >
                            @error('ordering')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            @include('back.components.buttons-save-apply', ['isNew' => true])

        </div>
    </div>



</form>

@endsection

@section('footer-scripts')
    <script src="{{ mix('/back/js/tiny.js') }}"></script>
@endsection
