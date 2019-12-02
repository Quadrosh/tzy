
$(document).ready(function() {


    $("body").on("click", ".linkToElement", function(e) {


        var el = $(this).attr('data-target');
        var name = "#"+el;

        console.log('$(this).offset().top');console.log($(this).offset().top);
        console.log('$(name).offset().top');console.log($(name).offset().top);

        if($(name).length > 0){
            $('html, body').animate({ scrollTop: $(name).offset().top}, 1000);
        }


    });


    // equal_columns('div[class*=equalHeight_]');
    //
    // function equal_columns(el){
    //     var groups = {};
    //     $(el).each(function(){
    //         var classList = $(this).prop("classList");
    //         for (var i1=0; i1<classList.length; i1++) {
    //             if (classList[i1].substring(0, 12) == 'equalHeight_' && !groups[classList[i1]]) {
    //                 groups[classList[i1]] = classList[i1];
    //             }
    //         }
    //     });
    //     for (var key in groups) {
    //         if (groups.hasOwnProperty(key)) {
    //             var h = 0;
    //             var groupItems = $('.'+key);
    //             groupItems.each(function(){
    //                 $(this).css({'height':'auto'});
    //                 if($(this).outerHeight() > h)
    //                 {
    //                     h = $(this).outerHeight();
    //                 }
    //             });
    //             groupItems.each(function(){
    //                 $(this).css({'height':h});
    //             });
    //         }
    //     }
    // }



    $('.asb-slick_top_carousel').slick({
        autoplay: true,
        autoplaySpeed: 4500,
        infinite: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        easing:'easeInOutSine',
        prevArrow:'.sticky_slick_top_slickPrev',
        nextArrow:'.sticky_slick_top_slickNext',
    });


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

                // adaptiveHeight: true,

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


