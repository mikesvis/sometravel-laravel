@extends('layouts.back.index')

@section('header', 'Редактирование изображения')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.image.update', $image->id) }}">

    @csrf
    @method('patch')

    <div class="row">
        <div class="col-12 col-lg-4 col-xl-3 order-lg-1">

            <div class="card">
                <div class="card-body">
                        <a href="{{ $image->path }}" class="fancybox">
                            <img src="/timthumb.php?src={{ $image->path }}&w=700&zc=2" class="w-100 img-thumbnail" alt="">
                        </a>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-8 col-xl-9 order-lg-0">

            <div class="card">
                <div class="card-body">

                        <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-xl-2" for="title">Название</label>
                                <div class="col-lg-9 col-xl-10">
                                    <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $image->title) }}"
                                    class="form-control @error('title')is-invalid @enderror"
                                    id="title"
                                    >
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-xl-2" for="alt">Alt</label>
                                <div class="col-lg-9 col-xl-10">
                                    <input
                                    type="text"
                                    name="alt"
                                    value="{{ old('alt', $image->alt) }}"
                                    class="form-control @error('alt')is-invalid @enderror"
                                    id="alt"
                                    >
                                    @error('alt')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-xl-2" for="link_to">Ссылка</label>
                                <div class="col-lg-9 col-xl-10">
                                    <input
                                    type="text"
                                    name="link_to"
                                    value="{{ old('link_to', $image->link_to) }}"
                                    class="form-control @error('link_to')is-invalid @enderror"
                                    id="link_to"
                                    >
                                    @error('link_to')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-xl-2">Описание</label>
                                <div class="col-lg-9 col-xl-10">
                                    <textarea
                                    name="description"
                                    class="form-control is-tiny @error('description')is-invalid @enderror"
                                    id="description"
                                    >{{ old('description', $image->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row align-items-center">
                                <label class="col-form-label col-lg-2 user-select-none" for="watermark">Водяной знак <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-10">
                                    <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="watermark" value="0">
                                        <input
                                        type="checkbox"
                                        name="watermark"
                                        value="1"
                                        class="custom-control-input"
                                        id="watermark"
                                        @if ((bool)old('watermark', $image->watermark) == true) checked @endif
                                        >
                                        <label class="custom-control-label d-block" for="watermark"></label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-2">
                                    <input
                                    type="number"
                                    name="ordering"
                                    value="{{ old('ordering', $image->ordering) }}"
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
                                        @if ((bool)old('status', $image->status) == true) checked @endif
                                        >
                                        <label class="custom-control-label d-block" for="status"></label>
                                    </div>
                                </div>
                            </div>

                            @include('back.components.buttons-save-apply', ['isNew' => false])

                </div>
            </div>

        </div>
    </div>







        </div>
    </div>

</form>

@endsection

@section('footer-scripts')
    <script src="{{ mix('/back/js/tiny.js') }}"></script>
@endsection
