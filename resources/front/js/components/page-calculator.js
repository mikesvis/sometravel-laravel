$(function(){
    $("#calculatorForm").change(function(){
        var form = document.querySelector('#calculatorForm');
        visaId = $("#calculatorForm input[type='hidden'][name='visa_id']").val();
        // console.log($("#calculatorForm").serialize());
        axios.post('/napravlenija/calculate/'+visaId, new FormData(form)).then(response => {

        }).catch(error => {

        });
    });
});
