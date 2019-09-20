import Swal from 'sweetalert2';
window.Swal = Swal;


$(function(){

    $(".delete").removeAttr("disabled");

    $(".delete").on('click', function(e){

        e.preventDefault();

        var deleteForm = $(this).parent("form");

        Swal.fire({
            title: 'Вы уверены?',
            text: 'Вы точно хотите удалить "'+$(this).data('element_name')+'"?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да, удалить!',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if(result.value){
                if($(this).data("delete") == 'nested'){
                    $("#deleteNestedForm").attr("action", $(this).data("action"));
                    deleteForm = $("#deleteNestedForm");
                }
                deleteForm.submit();
            }
        });

    });

});
