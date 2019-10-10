$(function(){
    $("#calculatorForm").change(function(){
        var form = document.querySelector('#calculatorForm');
        visaId = $("#calculatorForm input[type='hidden'][name='visa_id']").val();
        // console.log($("#calculatorForm").serialize());
        axios.post('/napravlenija/calculate/'+visaId, new FormData(form)).then(response => {
            $("#visaCalculatedPrice").text(response.data.price);
        }).catch(error => {
            console.log(error);
            modal = `
            <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <h5 class="modal-title text-success" id="exampleModalScrollableTitle">
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                        </div>
                    </div>
                </div>
            </div>`;
            // $('').modal();
        });
    });
});
