<div class="section-heading wizard__section-heading-wrapper d-flex align-items-center justify-content-between justify-content-sm-start pt-lg-3 mb-3 mb-lg-4">
    <div class="section-heading__name h4 m-0">Дополнительные сервисы</div>
    @if (count($descriptions))
        <div class="ml-4">
            <span
            class="section-heading__hint-toggle btn btn-outline-secondary p-0 rounded-circle"
            role="button"
            tabindex="0"
            data-trigger="hover"
            data-container="body"
            data-toggle="popover"
            data-placement="top"
            data-html="true"
            data-content="{{ implode('', $descriptions) }}"
            >?</span>
        </div>
    @endif
</div>
