import toastr from 'toastr';

$(function(){
    if(notis.length > 0){
        for(var i in notis){
            toastr[notis[i].type](notis[i].text, null, notis[i].options);
        }
    }
});
