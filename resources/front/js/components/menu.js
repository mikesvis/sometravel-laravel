var scrollClassAdded = false;

$(function(){

    $(".topPanel__menuWrapper").clone().children().appendTo(".mobilePanel__menuWrapper");
    $(".countriesButtons").clone().appendTo(".mobilePanel__countriesWrapper");
    $(".topPanel__accountWrapper").clone().children().appendTo(".mobilePanel__accountWrapper");
    $(".topPanel__addressWrapper").clone().children().appendTo(".mobilePanel__addressWrapper");
    $(".header__logoWrapper").clone().children().appendTo(".mobilePanel__logoWrapper");

});

$(".hamburger").click(function(){
    $(this).toggleClass("is-active");
    $(this).parent(".topPanel__burgerWrapper").toggleClass("topPanel__burgerWrapper--burgerMenuShown");
    $(".mobileWrapper").toggleClass("mobileWrapper--shown");
});
