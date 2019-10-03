@extends('layouts.back.index')

@section('header', 'Редактирование страницы "'.$page->title.'"')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.page.update', $page->id) }}" id="mainForm">

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
                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#seo') ? "active":"") }}" data-toggle="pill" href="#seo" role="tab" aria-controls="seo" aria-selected="{{ (($tabToGo == '#seo') ? "true":"false") }}">
                        <em class="fas fa-globe"></em>
                        <span class="d-none d-md-inline-block">Seo</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content px-3 py-4">

                {{-- primary --}}
                <div class="tab-pane fade {{ (($tabToGo == '#primary') ? "active show":"") }}" id="primary" role="tabpanel" aria-labelledby="primary">


                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="title">Заголовок <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title"
                            value="{{ old('title', $page->title) }}"
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
                        <label class="col-form-label col-lg-3 col-xl-2" for="menuname">Пункт меню</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="menuname"
                            value="{{ old('menuname', $page->menuname) }}"
                            class="form-control @error('menuname')is-invalid @enderror"
                            id="menuname"
                            >
                            @error('menuname')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="slug">URL код</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="slug"
                            value="{{ old('slug', $page->slug) }}"
                            class="form-control @error('slug')is-invalid @enderror"
                            id="slug"
                            >
                            @error('slug')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Содержимое страницы</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="content"
                            class="form-control is-tiny @error('content')content @enderror"
                            id="content"
                            >{{ old('content', $page->content) }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="ordering">Порядок <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="ordering"
                            value="{{ old('ordering', $page->ordering) }}"
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
                                @if ((bool)old('status', (bool)$page->status)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="status"></label>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- /primary --}}

                {{-- images --}}
                <div class="tab-pane {{ (($tabToGo == '#images') ? "active show":"") }}" id="images" role="tabpanel" aria-labelledby="images">
                    @include('back.image.index', ['model'=>$page, 'images'=>$page->images])
                </div>
                {{-- /images --}}

                {{-- seo --}}
                <div class="tab-pane {{ (($tabToGo == '#seo') ? "active show":"") }}" id="seo" role="tabpanel" aria-labelledby="seo">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="seo_title">Seo title</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="seo_title"
                            value="{{ old('seo_title', $page->seo_title) }}"
                            class="form-control @error('seo_title')is-invalid @enderror"
                            id="seo_title"
                            >
                            @error('seo_title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="seo_title">Seo keywords</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="seo_keywords"
                            value="{{ old('seo_keywords', $page->seo_keywords) }}"
                            class="form-control @error('seo_keywords')is-invalid @enderror"
                            id="seo_keywords"
                            >
                            @error('seo_keywords')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="seo_description">Seo description</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="seo_description"
                            rows="3"
                            class="form-control @error('seo_description')is-invalid @enderror"
                            id="seo_description"
                            >{{ old('seo_description', $page->seo_description) }}</textarea>
                            @error('seo_description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{-- /seo --}}

            </div>

            @include('back.components.buttons-save-apply', ['isNew' => false])

        </div>
    </div>

</form>

{{-- image upload form --}}
<form action="{{ route('admin.image.upload', [get_class($page), $page->id]) }}" method="POST" enctype="multipart/form-data" id="imageUploadForm" class="p-0 m-0 d-none">
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
