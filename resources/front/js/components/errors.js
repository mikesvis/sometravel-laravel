window.processErrors = function (errors, form) {
    $('*', form).removeClass('is-invalid');
    $('.invalid-feedback', form).remove();
    for(i in errors){
        if($("input[name='"+i+"']", form).length > 0){
            $("input[name='"+i+"']", form).addClass('is-invalid');
            $('<span class="invalid-feedback text-center d-block" role="alert">' + errors[i][0] + '</span>').insertAfter($("input[name='"+i+"']", form));
        }
    }
}
