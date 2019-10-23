$(function(){
    $("#checkoutForm").change(function(e){

        var form = document.querySelector('#checkoutForm');
        formData = new FormData(form);

        axios.post('/order/calculate', formData).then(response => {

            $("#checkoutCalculatedPrice").text(response.data.price);

        }).catch(error => {

            // console.log(error);
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
        });
    });
});
