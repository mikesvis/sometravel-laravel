<div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start mb-3 mb-lg-4">
    <div class="section-heading__name h4 m-0">Выберите количество получателей</div>
    <div class="ml-4">
        <span
        class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle"
        role="button"
        tabindex="0"
        data-trigger="hover"
        data-container="body"
        data-toggle="popover"
        data-placement="top"
        data-content="Укажите количество получателей визы"
        >?</span>
    </div>
</div>

<div class="row align-items-center mb-5">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxxl-2">
        <label for="persons" class="h2 visaCalcForm__label font-weight-normal mb-0 user-select-none">Количество</label>
    </div>
    <div class="col-7 col-sm-6 col-md-4 col-lg-3 col-xxxl-2 mt-2 mt-sm-0">

        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-primary btn--rounded px-3 px-xl-4 btn-number" disabled="disabled" data-type="minus" data-field="persons"><em class="fas fa-minus"></em></button>
            </div>
            <input class="textInput--quantity form-control border-primary text-center input-number" value="{{ old('persons', $persons) }}" min="1" max="100" placeholder="Кол-во" id="persons" name="persons" step="1" required>
            <div class="input-group-append">
                <button class="btn btn-primary btn--rounded px-3 px-xl-4 btn-number" data-type="plus" data-field="persons"><em class="fas fa-plus"></em></button>
            </div>
        </div>

    </div>
</div>
