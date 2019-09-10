$(".searchToggler__text").click(function(){
    $(".searchToggler__hidden", this).toggleClass("searchToggler__hidden--rollup");
    $(".searchModule").toggleClass("searchModule--shown");
});
