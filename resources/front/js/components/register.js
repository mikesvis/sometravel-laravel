import Swal from "sweetalert2";
import Axios from "axios";

let cooldownTimer = null;
let countdownTimer = null;
let timerInterval = 30;
let currentLeft = 0;

$("#registerForm").on("submit", function(e, options){
    // телефон отправляем на предпроверку
    options = options || {};

    if ( !options.lots_of_stuff_done ) {

        e.preventDefault();

        ajaxButtonFunctions(e, options, true);

        return false;

    }

});

function ajaxButtonFunctions(e, options, isFormSumbitEvent){

    Axios.get('/register/check-phone', {
        params: {
            phone: $("#registerForm input[name='phone']").val()
        }
    }).then(response => {

        clearValidationView($("#registerForm input[name='phone']"));

        if(response.data.status == 'incorrect'){
            addValidationError($("#registerForm input[name='phone']"), response.data.message);
            return false;
        }

        if(response.data.status == 'is_blocked'){
            addValidationError($("#registerForm input[name='phone']"), response.data.message);
            Swal.fire({
                title: 'Упс... ошибка',
                text: response.data.message,
                type: 'error',
                confirmButtonText: 'Хорошо'
            });
            return false;
        }

        if(response.data.status == false) {
            clearValidationView($("#registerForm input[name='phone']"));
            clearValidationView($("#checkCodeForm input[name='smsCode']"));
            let verificationModal = $("#verificationModal");
            $("#beautifulPhone", verificationModal).text(response.data.phone);
            $("#verificationPhone", verificationModal).val(response.data.phone.replace(/\D/g,''));
            $('#codeTextLegend').text('Мы выслали СМС код на ваш номер телефона. Пожалуйста введите его в поле ниже');

            if(countdownTimer == null){
                timerStartViews();
                countdownTimer = setInterval(function() { countdown(); }, 1000);
            }
            verificationModal.modal();
            return false;
        } else {
            clearValidationView($("#registerForm input[name='phone']"));
            addValidationSuccess($("#registerForm input[name='phone']"));
            if(isFormSumbitEvent){
                $(e.currentTarget).trigger('submit', { 'lots_of_stuff_done': true });
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

}

$('#verify').click(function(e){

    ajaxButtonFunctions(e, null, false);

    return false;

});

$("#checkCodeForm").on("submit", function(e){
    // e.preventDefault();

    Axios.get('/register/check-code', {
        params: {
            phone: $("#checkCodeForm input[name='phone']").val(),
            smsCode: $("#checkCodeForm input[name='smsCode']").val(),
        }
    }).then(response => {
        clearValidationView($("#checkCodeForm input[name='smsCode']"));
        addValidationSuccess($("#checkCodeForm input[name='smsCode']"));
        clearValidationView($("#registerForm input[name='phone']"));
        addValidationSuccess($("#registerForm input[name='phone']"));
        $("#verificationModal").modal('hide');
    }).catch(error => {
        clearValidationView($("#checkCodeForm input[name='smsCode']"));
        for(var field in error.response.data.errors){
            addValidationError($("#checkCodeForm input[name='smsCode']"), error.response.data.errors[field][0]);
            break;
        }
    });
    return false;
});

$("#resendCode").on("click", function(e){

    clearValidationView($("#checkCodeForm input[name='phone']"));
    $("#checkCodeForm input[name='smsCode']").val('');

    if(countdownTimer == null){
        timerStartViews();
        countdownTimer = setInterval(function() { countdown(); }, 1000);

        Axios.get('/register/resend-code', {
            params: {
                phone: $("#checkCodeForm input[name='phone']").val(),
            }
        }).then(response => {

            clearValidationView($("#checkCodeForm input[name='phone']"));

            if(response.data.status == 'is_blocked'){
                addValidationError($("#checkCodeForm input[name='phone']"), response.data.message);
                Swal.fire({
                    title: 'Упс... ошибка',
                    text: response.data.message,
                    type: 'error',
                    confirmButtonText: 'Хорошо'
                });
                return false;
            }

            if(response.data.status == false) {
                $("#codeTextLegend").text(response.data.message);
                $('#smsCode').focus();
                return false;
            } else {
                $("#codeTextLegend").text(response.data.message);
                $('#smsCode').focus();
                return false;
            }

        }).catch(error => {
            clearValidationView($("#checkCodeForm input[name='smsCode']"));
            for(var field in error.response.data.errors){
                addValidationError($("#checkCodeForm input[name='smsCode']"), error.response.data.errors[field][0]);
                break;
            }
        });

        return false;
    }
});

function timerStartViews(){
    $("#countdownText").removeClass("d-none").addClass("d-block");
    $("#countdownTimer").text(timerInterval);
    $("#resendText").removeClass("d-block").addClass("d-none");

    currentLeft = timerInterval;
}

function countdown(){
    currentLeft--;
    if(currentLeft <= 0) {
        $("#countdownText").addClass("d-none").removeClass('d-block');
        $("#resendText").addClass("d-block").removeClass('d-none');
        $("#countdownTimer").text(0);
        clearInterval(countdownTimer);
        countdownTimer = null;
    } else {
        $("#countdownTimer").text(currentLeft);
    }
}

function clearValidationView(element)
{
    element.removeClass('is-valid');
    element.removeClass('is-invalid');
    element.next("span").remove();
}

function addValidationError(element, message)
{
    element.addClass('is-invalid');
    $(element).after(`<span class="invalid-feedback text-center" role="alert">${message}</span>`);
}

function addValidationSuccess(element)
{
    element.addClass('is-valid');
}

$('#verificationModal').on('shown.bs.modal', function () {
    $('#smsCode').focus();
})
