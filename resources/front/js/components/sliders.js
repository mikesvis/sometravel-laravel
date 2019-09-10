require('slick-carousel/slick/slick.js');

$(function(){

    var sld = $(".slider.slider--splash ul").slick({
        fade: true,
        dots: true,
        arrows: false,
        autoplay: true
    });

    // $(".slider.slider--splash ul").on("beforeChange", function(slick){
    //     return false;
    // });

});
