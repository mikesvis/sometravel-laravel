var definedFormat = null;

$(function(){

    $('[data-format]').click(function(){
        definedFormat = $(this).data('format');
    });

    $(".popup-form-submit").click(function(){

        var buttonSubmit = $(this);

        var popupForm = document.querySelector($(this).data('form-id'));
        popupFormData = new FormData(popupForm);

        buttonSubmit.attr("disabled", true);


        if($(this).data('form-id') == '#visaOfficeForm'){
            popupFormData.append('isVisaPage', '1');
            var form = document.querySelector('#calculatorForm');
            formData = new FormData(form);
            for (var pair of formData.entries()) {
                popupFormData.append(pair[0], pair[1]);
            }
        }

        if($(this).data('form-id') == '#getPartipianceOfferForm'){
            popupFormData.append('isFranchisePage', '1');
            popupFormData.append('format', definedFormat);
        }

        axios.post($(popupForm).attr("action"), popupFormData).then(response => {

            $('<div class="modal-body p-4">' + response.data.message + '</div>').insertAfter(popupForm);
            $(popupForm).remove();


        }).catch(error => {

            if (error.response) {

                processErrors(error.response.data.errors, popupForm);

            } else {

                modal = `
                <div class="modal fade" id="visaCalculatorModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <h5 class="modal-title">
                                Произошла ошибка
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <p class="text-danger">Пожалуйста, свяжитесь с нами и сообщите о проблеме.</p>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(modal).modal();

            }

        });

        buttonSubmit.attr("disabled", false);

        return false;

    });

    $(".inline-feedbackform").submit(function(e) {
        e.preventDefault();

        var inlineForm = document.querySelector($(this).data('form-id'));

        inlineFormData = new FormData(inlineForm);

        console.log(inlineFormData);

        var buttonSubmit = $("button[type='submit']", $(this));

        buttonSubmit.attr("disabled", true);

        axios.post($(inlineForm).attr("action"), inlineFormData).then(response => {

            $(response.data.message).insertAfter(inlineForm);
            $(inlineForm).remove();


        }).catch(error => {

            if (error.response) {

                processErrors(error.response.data.errors, inlineForm);

            } else {

                modal = `
                <div class="modal fade" id="visaCalculatorModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <h5 class="modal-title">
                                Произошла ошибка
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <p class="text-danger">Пожалуйста, свяжитесь с нами и сообщите о проблеме.</p>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(modal).modal();

            }

        });

        buttonSubmit.attr("disabled", false);

    });
});
