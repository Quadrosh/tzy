

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
        success: function (response)
        {
            //alert(response);
            //var getupdatedata = $(response).find('#filter_id_test');
            // $.pjax.reload('#note_update_id'); for pjax update
            $('#calculatorResult').html(response);
            console.log(response);
        },

        error  : function ()
        {
            console.log('internal server error');
        }
        });


    return false; // Cancel form submitting.
});