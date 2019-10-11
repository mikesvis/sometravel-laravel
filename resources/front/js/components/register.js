import Swal from "sweetalert2";
import Axios from "axios";


$(function(){

    $("#register").click(function(e){
        // телефон отправляем на предпроверку

        Axios.get('/register/check-phone', {
            params: {
                phone: $("input[name='phone']").val()
            }
        }).then(response => {

            clearValidationView($("input[name='phone']"));

            if(response.data.status == 'incorrect'){
                addValidationError($("input[name='phone']"), response.data.message);
                return false;
            }

            if(response.data.status == 'is_blocked'){
                addValidationError($("input[name='phone']"), response.data.message);
                Swal.fire({
                    title: 'Хмм... ошибочка вышла',
                    text: response.data.message,
                    type: 'error',
                    confirmButtonText: 'Хорошо'
                });
                return false;
            }

            if(response.data.status == false) {
                clearValidationView($("input[name='phone']"));
                alert('Show verification modal');
                return false;
            } else {
                clearValidationView($("input[name='phone']"));
                addValidationSuccess($("input[name='phone']"));
            }

            if(response.data.status != 'incorrect'){
                if(response.data.status == false) {
                    alert('Show verification modal');
                    return false;
                } else {
                    $("input[name='phone']").addClass('is-valid');
                }
            }
        }).catch(error => {

            let message = `Что-то пошло не так. Пожалуйста, свяжитесь с нами и сообщите о проблеме.`;

            Swal.fire({
                title: 'Упс... ошибка',
                text: message,
                type: 'error',
                confirmButtonText: 'Хорошо'
            });

            return false;
        });

    });

});

function clearValidationView(element)
{
    element.removeClass('is-valid');
    element.removeClass('is-invalid');
    element.next("span").remove();
}

function addValidationError(element, message) {
    element.addClass('is-invalid');
    $(element).after(`<span class="invalid-feedback text-center" role="alert">${message}</span>`);
}

function addValidationSuccess(element) {
    element.addClass('is-valid');
}
