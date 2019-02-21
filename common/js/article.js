

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
    });
    if (document.getElementsByClassName('slickMulti')) {
        var arr = document.getElementsByClassName('slickMulti');

        for (var i = 0; i < arr.length; i++) {
            var id = arr[i].getAttribute('data-id');
            var showItems = arr[i].getAttribute('data-showItems')? arr[i].getAttribute('data-showItems'):1;
            slick(id,showItems);
        }

        function slick(id,show) {
            $('.slick_multi_'+id).slick({
                infinite: true,
                slidesToShow: show,
                slidesToScroll: 1,
                dots: false,
                easing:'easeInOutSine',
                prevArrow:'.slickPrev'+id,
                nextArrow:'.slickNext'+id,
                responsive: [
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }
    }


    $('.magImg').magnificPopup({
        type: 'image',
        image: {
            markup: '<div class="mfp-figure">'+
            '<div class="mfp-close"></div>'+
            '<div class="mfp-img"></div>'+
            '<div class="mfp-bottom-bar">'+
            '<div class="mfp-title"></div>'+
            '<div class="mfp-counter"></div>'+
            '</div>'+
            '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

            cursor: null,
            verticalFit: false,

            tError: '<a href="%url%">Изображение</a> не может быть загружено.' // Error message
        },
        gallery: {
            enabled: false,
        },
        fixedContentPos: true,
        overflowY:true,
    });


});

$(document).on("beforeSubmit", "#priceCalculator", function () {
    var form = $(this);
    if (form.find('.has-error').length) {
        return false;
    }
    $.ajax({
        url    : form.attr('action'),
        type   : 'post',
        data   : form.serialize(),
        success: function (response) {
            $('#calculatorResult').html(response);
        },
        error  : function () {
            console.log('internal server error');
        }
    });
    return false; // Cancel form submitting.
});

$(document).on("beforeSubmit", "#cityPriceCalc", function () {
    var form = $(this);
    if (form.find('.has-error').length) {
        return false;
    }
    $.ajax({
        url    : form.attr('action'),
        type   : 'post',
        data   : form.serialize(),
        success: function (response) {
            $('#calcResult').html(response);
        },
        error  : function () {
            console.log('internal server error');
        }
    });
    return false; // Cancel form submitting.
});