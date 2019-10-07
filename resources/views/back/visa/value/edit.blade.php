@extends('layouts.back.index')

@section('header', 'Значение "'.$value->title.'" для параметра "'.$value->parameter->title.'"')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.value.update', $value) }}">

    @csrf
    @method('patch')

    <input type="hidden" name="tabToGo" value="primary">

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
                        <label class="col-form-label col-lg-3 col-xl-2" for="title">Название (при заказе)<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title"
                            value="{{ old('title', $value->title) }}"
                            class="form-control @error('title')is-invalid @enderror"
                            id="title"
                            required
                            >
                            @error('title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="calculator_title">Название (в калькуляторе)</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="calculator_title"
                            value="{{ old('calculator_title', $value->calculator_title) }}"
                            class="form-control @error('calculator_title')is-invalid @enderror"
                            id="calculator_title"
                            >
                            @error('calculator_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="price">Надбавка к цене<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="price"
                            value="{{ old('price', $value->price) }}"
                            class="form-control @error('price')is-invalid @enderror"
                            id="price"
                            required
                            min="0"
                            step="1"
                            >
                            @error('price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="is_default">Выбрано по умолчанию <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_default" value="0">
                                <input
                                type="checkbox"
                                name="is_default"
                                value="1"
                                class="custom-control-input"
                                id="is_default"
                                @if ((bool)old('is_default', $value->is_default)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="is_default"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="ordering"
                            value="{{ old('ordering', $value->ordering) }}"
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

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="status">Включено <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="status" value="0">
                                <input
                                type="checkbox"
                                name="status"
                                value="1"
                                class="custom-control-input"
                                id="status"
                                @if ((bool)old('status', $value->status)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="status"></label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @include('back.components.buttons-save-apply', ['isNew' => false])

        </div>
    </div>



</form>

@endsection
