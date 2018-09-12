window.onload = function(){

    $("#getHrurlFromArticleListname").on("click", function () {
        $.ajax({
            url: "/article/hrurl",
            dataType: "html",
            data: {
                text: $("#article-list_name").val(),
                length:210,
                toLowerCase:true,
                articleId:$("#getHrurlFromArticleListname").data('modelId'),
            },
            success: function(data){
                $("#article-hrurl").val(data);
            },
            error: function () {
                alert('Не получилось');
            }
        });

    });



};





$(document).ready(function() {

    //
    //$("#services-call2action").on("afterValidate", function () {
    //    yaCounter30134129.reachGoal("callMe");
    //    ga("send","event","feedback","call","callMe");
    //});


    $('.asb-slick_banner_1_carousel').slick({
        infinite: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        easing:'easeInOutSine',
        prevArrow:'.asb-slick_banner_1_slickPrev',
        nextArrow:'.asb-slick_banner_1_slickNext',
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
        //appendArrows:'.popularItems',
    });



});