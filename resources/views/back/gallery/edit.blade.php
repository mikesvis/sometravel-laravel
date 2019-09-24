@extends('layouts.back.index')

@section('header', 'Редактирование галереи '.$gallery->title)

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" id="mainForm">

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
                <div class="tab-pane {{ (($tabToGo == '#primary') ? "active show":"") }}" id="primary" role="tabpanel" aria-labelledby="primary">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="title">Название <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title"
                            value="{{ old('title', $gallery->title) }}"
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
                            class="form-control is-tiny @error('description')is-invalid @enderror"
                            id="description"
                            >{{ old('description', $gallery->description) }}</textarea>
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
                            value="{{ old('notes', $gallery->notes) }}"
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
                                @if ((bool)old('status', $gallery->status) == true) checked @endif
                                >
                                <label class="custom-control-label d-block" for="status"></label>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- /primary --}}

                {{-- images --}}
                <div class="tab-pane {{ (($tabToGo == '#images') ? "active show":"") }}" id="images" role="tabpanel" aria-labelledby="images">
                    @include('back.image.index', ['model'=>$gallery, 'images'=>$gallery->images])
                </div>
                {{-- /images --}}

            </div>

            @include('back.components.buttons-save-apply', ['isNew' => false])

        </div>
    </div>

</form>

{{-- image upload form --}}
<form action="{{ route('admin.image.upload', [class_basename($gallery), $gallery->id]) }}" method="POST" enctype="multipart/form-data" id="imageUploadForm" class="p-0 m-0 d-none">
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
