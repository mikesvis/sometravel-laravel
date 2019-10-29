<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('front.forms.visa-office') }}" method="POST" id="{{ $formId }}">

                @csrf
                <input type="hidden" name="formTitle" value="{{ $modalTitle }}">
                <input type="hidden" name="formUrl" value="{{ Request::url() }}">

                <div class="modal-body p-4">

                    <p class="text-center">{{ $formDescription }}</p>

                    <div class="form-row mb-2">
                        <input
                        type="text"
                        name="name"
                        value=""
                        id="name"
                        placeholder="Представьтесь *"
                        required
                        autocomplete="phone"
                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                        >
                    </div>

                    <div class="form-row mb-2">
                        <input
                        type="text"
                        name="phone"
                        value=""
                        id="phone"
                        placeholder="Телефон для связи *"
                        required
                        autocomplete="phone"
                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                        >
                    </div>

                    <div class="form-row mb-2">
                        <input
                        type="text"
                        name="email"
                        value=""
                        id="email"
                        placeholder="E-mail *"
                        required
                        autocomplete="email"
                        class="textInput textInput--borderPrimary textInput--rounded textInput--biggerText form-control text-center"
                        >
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 popup-form-submit" data-form-id="#{{ $formId }}">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
