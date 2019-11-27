<!-- no time to explain -->
<div class="feedbackFormHolder bg-light vpm__mt vpm__py">
    <div class="container">

        <!-- block heading -->
        <div class="heading row mt-3 mb-2">
            <div class="col-12">
                <div class="heading__text text-center mb-2">{!! $heading !!}</div>
                <p class="text-center mb-4">{!! $subHeading !!}</p>
            </div>
        </div>
        <!-- block heading -->

        <!-- feedback form -->
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-9 col-xxxl-7">

                <div class="feedbackForm mt-2">
                    {{-- <p class="h4 text-success text-center">123123</p> --}}
                    <form action="{{ route('front.forms.mainpage') }}" method="POST" class="inline-feedbackform" data-form-id="#{{ $formId }}" id="{{ $formId }}">

                        @csrf

                        <input type="hidden" name="formTitle" value="{{ $formTitle }}">
                        <input type="hidden" name="formUrl" value="{{ Request::url() }}">

                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <input
                                type="text"
                                name="name"
                                value=""
                                class="textInput textInput--borderPrimary textInput--biggerForMobile form-control rounded-pill text-center"
                                placeholder="Имя"
                                autocomplete="name"
                                required>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <input
                                type="text"
                                name="phone"
                                value=""
                                class="textInput textInput--borderPrimary textInput--biggerForMobile form-control rounded-pill text-center"
                                placeholder="+7 (___) ___-__-__"
                                autocomplete="phone"
                                required>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <button type="submit" name="feedbackFormSubmit" class="submitButton submitButton--biggerForMobile btn btn-primary btn-block rounded-pill">Оставить заявку</button>
                            </div>

                            <div class="col-12 col-md-10 col-xl-10 col-xxl-8 col-xxxl-10">
                                <div class="feedbackForm__agreeText feedbackForm__agreeText--small text-muted text-center mt-4">
                                    Нажимая на кнопку &laquo;Оставить заявку&raquo;, Вы подтверждаете свое совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с <a href="/usloviya">Условиями</a>.
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- feedback form -->

        <!-- pnone under -->
        <div class="heading row vpm__mt mb-3">
            <div class="col-12">
                <div class="heading__text text-center mb-1">
                    @include('front.components.main-phone', [
                        'aTemplate' => '<a href="tel:!PHONE_NUMBER!" class="text-primary d-block d-md-none text-decoration-none">!PHONE_NUMBER_HUMAN!</a>',
                        'spanTemplate'=> '<span class="text-primary d-none d-md-block">!PHONE_NUMBER_HUMAN!</span>'
                    ])
                </div>
                <p class="text-center">Бесплатный звонок</p>
            </div>
        </div>
        <!-- /pnone under -->

    </div>
</div>
<!-- /no time to explain -->
