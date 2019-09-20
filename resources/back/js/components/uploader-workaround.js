$(function(){
    $("#uploadButton").click(function(e){
        e.preventDefault();
        if($("#imageUploadFormMimic .invalid-feedback").length == 0) {
            $('<span class="invalid-feedback" role="alert"></span>').appendTo(".custom-file");
        } else {
            $("#imageUploadFormMimic .invalid-feedback").html('');
        }
        $("#imageUpload").removeClass('is-invalid');
        if($("#imageUpload").val() == ''){
            $("#imageUpload").addClass('is-invalid');
            $("#imageUploadFormMimic .invalid-feedback").html('Вы должны выбрать файл для загрузки');
            return
        }
        $("#imageUploadFormMimic").appendTo("#imageUploadForm");
        $("#formTrigger").click();
    });

});
