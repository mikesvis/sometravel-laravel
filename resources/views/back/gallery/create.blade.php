@extends('layouts.back.index')

@section('header', 'Новая галерея')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.gallery.store') }}">

    @csrf

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

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Описание</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="description"
                            class="form-control is-tiny @error('description')description @enderror"
                            id="description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="notes">Заметки</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="notes"
                            value="{{ old('notes') }}"
                            class="form-control @error('notes')is-invalid @enderror"
                            id="notes"
                            >
                            @error('notes')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="status">Включена <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="status" value="0">
                                <input
                                type="checkbox"
                                name="status"
                                value="1"
                                class="custom-control-input"
                                id="status"
                                @if ((bool)old('status', true)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="status"></label>
                            </div>
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
