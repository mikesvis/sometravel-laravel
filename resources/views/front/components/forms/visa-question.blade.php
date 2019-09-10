<!-- no time to explain -->
<div class="feedbackFormHolder bg-light vpm__py">
    <div class="container">

        <!-- block heading -->
        <div class="heading row mt-3 mb-2 justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-12">
                <div class="heading__text text-center mb-2">{!! $heading !!}</div>
                <p class="text-center mb-4">{!! $subHeading !!}</p>
            </div>
        </div>
        <!-- block heading -->

        <!-- feedback form -->
        <div class="row justify-content-center vpm__mb">
            <div class="col-12 col-xxl-9 col-xxxl-7">

                <div class="feedbackForm mt-2">
                    <form action="" class="needs-validation" {{-- class="was-validated" --}}>

                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4 col-xxl-5 mb-4 mb-md-0">
                                <input type="text" value="" class="textInput textInput--borderPrimary textInput--biggerForMobile form-control rounded-pill text-center" placeholder="+7 (___) ___-__-__" required>
                                {{-- <input type="text" value="" class="textInput textInput--borderPrimary form-control rounded-pill text-center is-invalid" placeholder="+7 (___) ___-__-__" required>
                                <div class="invalid-feedback text-center">Укажите номер телефона</div> --}}
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xxl-5">
                                <button type="submit" name="feedbackFormSubmit" class="submitButton submitButton--biggerForMobile btn btn-primary btn-block rounded-pill">Отправить</button>
                            </div>

                            <div class="col-12 col-md-10 col-xl-10 col-xxl-8 col-xxxl-10">
                                <div class="feedbackForm__agreeText feedbackForm__agreeText--small text-muted text-center mt-4">
                                    Нажимая на кнопку &laquo;Отправить&raquo;, Вы подтверждаете свое совершеннолетие, соглашаетесь на обработку персональных данных в соответствии с <a href="">Условиями</a>{{--, а также с <u><a href="">Условиями продажи</a></u> --}}.
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- feedback form -->

    </div>
</div>
<!-- /no time to explain -->
