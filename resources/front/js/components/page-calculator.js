$(function(){
    $("#calculatorForm").change(function(e){

        if($('input[name="parameter_regular[biometrics]"]:checked').length > 0){
            $('input[name="parameter_regular[application_type]"][value="1"]').attr("disabled", false);
            if($('input[name="parameter_regular[biometrics]"]:checked').val() == 0){
                $('input[name="parameter_regular[application_type]"][value="1"]').attr("disabled", true);
                // $('input[name="parameter_regular[application_type]"]').removeAttr("checked");
                if($('input[name="parameter_regular[application_type]"]:checked').val() == 1){
                    $('input[name="parameter_regular[application_type]"][value="0"]').click();
                    return false;
                }
            }
        }

        var form = document.querySelector('#calculatorForm');
        formData = new FormData(form);

        visaId = $("#calculatorForm input[type='hidden'][name='visa_id']").val();

        axios.post('/napravlenija/calculate/'+visaId, formData).then(response => {

            $("#visaCalculatedPrice").text(response.data.price);

        }).catch(error => {

            console.log(error);
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
            // $(modal).modal();
        });
    });
});
