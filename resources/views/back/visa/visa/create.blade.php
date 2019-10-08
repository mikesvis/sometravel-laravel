@extends('layouts.back.index')

@section('header', 'Новая страна')

@section('content')

{{-- @include('back.components.errors') --}}

<form method="POST" action="{{ route('admin.visa.store') }}">

    @csrf
    @php
        $tabToGo = (old('tabToGo') != null) ? old('tabToGo') : '#'.$tabToGo;
        $tabsErrors = App\Models\Visa\Visa::tabsErrors($errors);
    @endphp

    <input type="hidden" name="tabToGo" value="{{ $tabToGo }}">

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                <li class="nav-item">
                <a class="nav-link {{ (($tabToGo == '#primary') ? "active":"") }} {{ $tabsErrors['primary'] ? 'text-danger' : '' }}" data-toggle="pill" href="#primary" role="tab" aria-controls="primary" aria-selected="{{ (($tabToGo == '#primary') ? "true":"false") }}">
                        <em class="fas fa-home"></em>
                        <span class="d-none d-md-inline-block @error('title', 'title_to') text-danger @enderror">Основное</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (($tabToGo == '#baseParams') ? "active":"") }} {{ $tabsErrors['baseParams'] ? 'text-danger' : '' }}" data-toggle="pill" href="#baseParams" role="tab" aria-controls="baseParams" aria-selected="{{ (($tabToGo == '#baseParams') ? "true":"false") }}">
                        <em class="fas fa-project-diagram"></em>
                        <span class="d-none d-md-inline-block">Базовые параметры</span>
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
                            value="{{ old('title') }}"
                            class="form-control @error('title')is-invalid @enderror"
                            id="title"
                            placeholder="Например: Франция"
                            required
                            >
                            @error('title')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="title_to">
                            Заголовок с склонением <span class="text-danger">*</span>
                            <span class="badge badge-light border" data-toggle="tooltip" data-placement="auto" title="Будет использоваться в тексте. Например: Получение визы {во Францию}">?</span>
                        </label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="title_to"
                            value="{{ old('title_to') }}"
                            class="form-control @error('title_to')is-invalid @enderror"
                            id="title_to"
                            placeholder="Например: во Францию"
                            required
                            >
                            @error('title_to')
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
                            value="{{ old('menuname') }}"
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
                            value="{{ old('slug') }}"
                            class="form-control @error('slug')is-invalid @enderror"
                            id="slug"
                            >
                            @error('slug')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Категории</label>
                        <div class="col-lg-9 col-xl-10">
                            <select name="categories[]" class="select2 {{ $errors->has('categories') ? 'is-invalid':'' }}" data-placeholder="Выберите категорию" data-tags-input="true" data-allow-clear="true" data-fouc multiple>
                                    @forelse ($categoriesList as $category)
                                    <option value="{{ $category->id }}" {{ (in_array($category->id, old('categories',[])) ? "selected":"") }}>{{ $category->title }}</option>
                                    @empty
                                    <option value="">Категорий пока нет</option>
                                    @endforelse
                                </select>
                            @error('categories')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="excerpt">Анонс</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="excerpt"
                            rows="3"
                            class="form-control @error('excerpt')is-invalid @enderror"
                            id="excerpt"
                            required
                            >{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Содержимое страницы</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="content"
                            class="form-control is-tiny @error('content')is-invalid @enderror"
                            id="content"
                            >{{ old('content') }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Текст в блоке "Документы"</label>
                        <div class="col-lg-9 col-xl-10">
                            <textarea
                            name="documents_text"
                            class="form-control is-tiny @error('documents_text')is-invalid @enderror"
                            id="documents_text"
                            rows="4"
                            >{{ old('documents_text') }}</textarea>
                            @error('documents_text')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Документы</label>
                        <div class="col-lg-9 col-xl-10">
                            <select name="documents[]" class="select2 {{ $errors->has('documents') ? 'is-invalid':'' }}" data-placeholder="Выберите документы" data-tags-input="true" data-allow-clear="true" data-fouc multiple>
                                    @forelse ($documentsList as $document)
                                    <option value="{{ $document->id }}" {{ (in_array($document->id, old('documents',[])) ? "selected":"") }}>{{ $document->title }}</option>
                                    @empty
                                    <option value="">Документов пока нет</option>
                                    @endforelse
                                </select>
                            @error('categories')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="is_popular">Популярное (на главной) <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_popular" value="0">
                                <input
                                type="checkbox"
                                name="is_popular"
                                value="1"
                                class="custom-control-input"
                                id="is_popular"
                                @if ((bool)old('is_popular', false)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="is_popular"></label>
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
                {{-- /primary --}}

                {{-- baseParams --}}
                <div class="tab-pane {{ (($tabToGo == '#baseParams') ? "active show":"") }}" id="baseParams" role="tabpanel" aria-labelledby="baseParams">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="base_price">Базовая цена <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-2">
                            <input
                            type="number"
                            name="base_price"
                            value="{{ old('base_price', 0) }}"
                            class="form-control @error('base_price')is-invalid @enderror"
                            id="base_price"
                            required
                            min="0"
                            step="1"
                            >
                            @error('base_price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                            <span class="text-small text-muted d-block">Цена визы для 1-го человека</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Тип подачи</label>
                        <div class="col-lg-9 col-xl-10">
                            @foreach (App\Helpers\VisaHelper::getApplicationTypeNamesForAdmin() as $key => $element)
                                <div class="custom-control custom-radio">
                                    <input
                                    type="radio"
                                    name="application_type"
                                    value="{{ $key }}"
                                    class="custom-control-input"
                                    id="application_type_{{ $key }}"
                                    {{ ($key == old('application_type', 1) ? "checked":"") }}
                                    >
                                    <label class="custom-control-label" for="application_type_{{ $key }}">{{ $element }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="application_absence_price">
                            Надбавка за "Без присутствия"
                            <span class="badge badge-light border" data-toggle="tooltip" data-placement="auto" title="Надбавка к цене если выбран тип подачи без присутствия">?</span>
                        </label>
                        <div class="col-12 col-lg-2">
                            <input
                            type="number"
                            name="application_absence_price"
                            value="{{ old('application_absence_price') }}"
                            class="form-control @error('application_absence_price')is-invalid @enderror"
                            id="application_absence_price"
                            min="0"
                            step="1"
                            >
                            @error('application_absence_price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Забор документов</label>
                        <div class="col-lg-9 col-xl-10">
                            @foreach (App\Helpers\VisaHelper::getAcceptanceTypeNamesForAdmin() as $key => $element)
                                <div class="custom-control custom-radio">
                                    <input
                                    type="radio"
                                    name="acceptance_type"
                                    value="{{ $key }}"
                                    class="custom-control-input"
                                    id="acceptance_type_{{ $key }}"
                                    {{ ($key == old('acceptance_type', 1) ? "checked":"") }}
                                    >
                                    <label class="custom-control-label" for="acceptance_type_{{ $key }}">{{ $element }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="acceptance_price">
                            Надбавка за "Забор курьером"
                            <span class="badge badge-light border" data-toggle="tooltip" data-placement="auto" title="Надбавка к цене если выбран забор документов курьером">?</span>
                        </label>
                        <div class="col-12 col-lg-2">
                            <input
                            type="number"
                            name="acceptance_price"
                            value="{{ old('acceptance_price') }}"
                            class="form-control @error('acceptance_price')is-invalid @enderror"
                            id="acceptance_price"
                            min="0"
                            step="1"
                            >
                            @error('acceptance_price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2">Доставка документов</label>
                        <div class="col-lg-9 col-xl-10">
                            @foreach (App\Helpers\VisaHelper::getDeliveryTypeNamesForAdmin() as $key => $element)
                                <div class="custom-control custom-radio">
                                    <input
                                    type="radio"
                                    name="delivery_type"
                                    value="{{ $key }}"
                                    class="custom-control-input"
                                    id="delivery_type_{{ $key }}"
                                    {{ ($key == old('delivery_type', 1) ? "checked":"") }}
                                    >
                                    <label class="custom-control-label" for="delivery_type_{{ $key }}">{{ $element }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="delivery_price">
                            Надбавка за "Доставка курьером"
                            <span class="badge badge-light border" data-toggle="tooltip" data-placement="auto" title="Надбавка к цене если выбрана доставка документов курьером">?</span>
                        </label>
                        <div class="col-12 col-lg-2">
                            <input
                            type="number"
                            name="delivery_price"
                            value="{{ old('delivery_price') }}"
                            class="form-control @error('delivery_price')is-invalid @enderror"
                            id="delivery_price"
                            min="0"
                            step="1"
                            >
                            @error('delivery_price')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 user-select-none" for="is_insurable">
                            Страховка
                            <span class="badge badge-light border" data-toggle="tooltip" data-placement="auto" title="В разделе &laquo;Дополнительные сервисы&raquo; есть пункт страховка">?</span>
                        </label>
                        <div class="col-lg-9 col-xl-10">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="is_insurable" value="0">
                                <input
                                type="checkbox"
                                name="is_insurable"
                                value="1"
                                class="custom-control-input"
                                id="is_insurable"
                                @if ((bool)old('is_insurable', true)) checked @endif
                                >
                                <label class="custom-control-label d-block" for="is_insurable"></label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 col-xl-10 offset-lg-3 offset-xl-2 mt-0"><span class="text-small text-muted d-block"></span></div>
                    </div>

                </div>
                {{-- baseParams --}}

                {{-- seo --}}
                <div class="tab-pane {{ (($tabToGo == '#seo') ? "active show":"") }}" id="seo" role="tabpanel" aria-labelledby="seo">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-xl-2" for="seo_title">Seo title</label>
                        <div class="col-lg-9 col-xl-10">
                            <input
                            type="text"
                            name="seo_title"
                            value="{{ old('seo_title') }}"
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
                            value="{{ old('seo_keywords') }}"
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
                            >{{ old('seo_description') }}</textarea>
                            @error('seo_description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{-- /seo --}}

            </div>

            @include('back.components.buttons-save-apply', ['isNew' => true])

        </div>
    </div>



</form>

@endsection

@section('footer-scripts')
    <script src="{{ mix('/back/js/tiny.js') }}"></script>
@endsection
