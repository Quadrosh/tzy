$(document).ready(function() {


    // цели в метрику и GA

    $("#call_form").on("afterValidate", function () {
        yaCounter52570411.reachGoal("order");
        gtag('event', 'order', {
            'event_category': 'siteAction',
            'event_action': 'sendForm',
            'event_label': 'commonPreOrder'
        });
    });

    $("#fast_order_form").on("afterValidate", function () {
        yaCounter52570411.reachGoal("order");
        gtag('event', 'order', {
            'event_category': 'siteAction',
            'event_action': 'sendForm',
            'event_label': 'commonPreOrder'
        });
    });

    $("#order_form").on("afterValidate", function () {
        yaCounter52570411.reachGoal("order");
        gtag('event', 'order', {
            'event_category': 'siteAction',
            'event_action': 'sendForm',
            'event_label': 'commonPreOrder'
        });
    });




    // UTM
    function getUtm(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }

    if(getUtm('utm_source')){
        var utmTags = {
            utm_source:getUtm('utm_source'),
            utm_medium:getUtm('utm_medium'),
            utm_campaign:getUtm('utm_campaign'),
            utm_term:getUtm('utm_term'),
            utm_content:getUtm('utm_content')
        };
        localStorage.setItem('utmTags', JSON.stringify(utmTags));
    }
    var utmLocal = JSON.parse(localStorage.getItem('utmTags'));
    if (utmLocal) {
        if (document.getElementById('fast_order_form-utm_source')) {
            document.getElementById('fast_order_form-utm_source').value = utmLocal.utm_source;
            document.getElementById('fast_order_form-utm_medium').value = utmLocal.utm_medium;
            document.getElementById('fast_order_form-utm_campaign').value = utmLocal.utm_campaign;
            document.getElementById('fast_order_form-utm_term').value = utmLocal.utm_term;
            document.getElementById('fast_order_form-utm_content').value = utmLocal.utm_content;
        }
        if (document.getElementById('call_form-utm_source')) {
            document.getElementById('call_form-utm_source').value = utmLocal.utm_source;
            document.getElementById('call_form-utm_medium').value = utmLocal.utm_medium;
            document.getElementById('call_form-utm_campaign').value = utmLocal.utm_campaign;
            document.getElementById('call_form-utm_term').value = utmLocal.utm_term;
            document.getElementById('call_form-utm_content').value = utmLocal.utm_content;
        }
        if (document.getElementById('order_form-utm_source')) {
            document.getElementById('order_form-utm_source').value = utmLocal.utm_source;
            document.getElementById('order_form-utm_medium').value = utmLocal.utm_medium;
            document.getElementById('order_form-utm_campaign').value = utmLocal.utm_campaign;
            document.getElementById('order_form-utm_term').value = utmLocal.utm_term;
            document.getElementById('order_form-utm_content').value = utmLocal.utm_content;
        }
    }



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
                autoplay:true,
                autoplaySpeed:3000,
                slidesToShow: show,
                slidesToScroll: 1,
                dots: true,
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