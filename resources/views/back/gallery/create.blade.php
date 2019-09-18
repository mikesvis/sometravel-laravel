@extends('layouts.back.index')

@section('header', 'Новая галерея')

@section('content')

@include('back.components.errors')

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
                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Settings</a>
                </li> --}}
            </ul>

            <div class="tab-content px-3 py-4">
                <div class="tab-pane fade active show" id="primary" role="tabpanel" aria-labelledby="primary">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="parent_id">Родитель <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            @if (count($categoriesList))
                            <select class="form-control" name="parent_id" id="parent_id" autofocus>
                                @foreach ($categoriesList as $category)
                                    <option value="{{ $category->id }}">{{ $category->id_title }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="title">Название <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="form-control @error('email')is-invalid @enderror"
                            id="title"
                            required
                            >
                            @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Описание</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="description"
                            class="form-control is-tiny @error('email')description @enderror"
                            id="description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                            <input
                            type="number"
                            name="ordering"
                            value="{{ old('ordering', 1) }}"
                            class="form-control @error('ordering')is-invalid @enderror"
                            id="ordering"
                            min="0"
                            step="1"
                            required
                            >
                            @error('ordering')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="status">Включена</label>
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
                {{-- <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                </div>
                <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div> --}}
            </div>

            @include('back.components.buttons-save-apply', ['isNew' => true])

        </div>
    </div>



</form>

@endsection

@section('footer-scripts')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{ mix('/back/js/tiny.js') }}"></script>
@endsection
