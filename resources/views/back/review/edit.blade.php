@extends('layouts.back.index')

@section('header', 'Редактирование отзыва "'.$review->title.'"')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.review.update', $review->id) }}" id="mainForm">

    @csrf
    @method('patch')

    @php
    $tabToGo = (old('tabToGo') != null) ? old('tabToGo') : '#'.$tabToGo;
    @endphp

    <input type="hidden" name="tabToGo" value="{{ $tabToGo }}">

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#primary') ? "active":"") }}" data-toggle="pill" href="#primary" role="tab" aria-controls="primary" aria-selected="{{ (($tabToGo == '#primary') ? "true":"false") }}">
                        <em class="fas fa-home"></em>
                        <span class="d-none d-md-inline-block">Основное</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#images') ? "active":"") }}" data-toggle="pill" href="#images" role="tab" aria-controls="images" aria-selected="{{ (($tabToGo == '#images') ? "true":"false") }}">
                        <em class="fas fa-image"></em>
                        <span class="d-none d-md-inline-block">Изображения</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content px-3 py-4">

                {{-- primary --}}
                <div class="tab-pane fade {{ (($tabToGo == '#primary') ? "active show":"") }}" id="primary" role="tabpanel" aria-labelledby="primary">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="name">Имя <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="name"
                            value="{{ old('name', $review->name) }}"
                            class="form-control @error('name')is-invalid @enderror"
                            id="name"
                            required
                            >
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="content">Тест отзыва</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="content"
                            rows="5"
                            class="form-control @error('content')is-invalid @enderror"
                            id="content"
                            required
                            >{{ old('content', $review->content) }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="date">Дата <span class="text-danger">*</span></label>
                        <div class="col-lg-4 col-xl-3">
                            <div class="input-group datetimepicker">
                                <input
                                type="text"
                                name="date"
                                value="{{ old('date', $review->date) }}"
                                class="form-control {{ $errors->has('date') ? 'is-invalid':'' }}"
                                id="date"
                                required
                                data-input
                                >
                                <span class="input-group-append">
                                    <span class="input-group-text" data-toggle><i class="far fa-calendar"></i></span>
                                </span>
                                @error('date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="ordering"
                            value="{{ old('ordering', $review->ordering) }}"
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
                                @if ((bool)old('status', $review->status)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="status"></label>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- /primary --}}

                {{-- images --}}
                <div class="tab-pane {{ (($tabToGo == '#images') ? "active show":"") }}" id="images" role="tabpanel" aria-labelledby="images">
                    @include('back.image.index', ['model'=>$review, 'images'=>$review->images])
                </div>
                {{-- /images --}}

            </div>

            @include('back.components.buttons-save-apply', ['isNew' => false])

        </div>
    </div>

</form>

{{-- image upload form --}}
<form action="{{ route('admin.image.upload', [class_basename($review), $review->id]) }}" method="POST" enctype="multipart/form-data" id="imageUploadForm" class="p-0 m-0 d-none">
    @csrf
    <button type="submit" class="btn btn-success" id="formTrigger">
        Это из-за того что нельзя делать вложенные формы
    </button>
</form>
{{-- /image upload form --}}

{{-- image delete form  --}}
<form action="" method="post" id="deleteNestedForm" class="p-0 m-0 d-none">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-outline-danger" id="deleteNestedFormSubmit">
        Это из-за того что нельзя делать вложенные формы
    </button>
</form>
{{-- /image delete form  --}}

@endsection

@section('footer-scripts')
<script src="{{ mix('/back/js/tiny.js') }}"></script>
@endsection
