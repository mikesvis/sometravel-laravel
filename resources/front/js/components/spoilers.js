$(function(){
    $(".spoiler-toggle").click(function(){
        $(this).toggleClass("d-block").toggleClass("d-none").next(".spoiler-body").toggleClass("d-block").toggleClass("d-none");
    });
});
