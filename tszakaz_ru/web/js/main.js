$(document).ready(function() {


    // цели в метрику и GA
    $("#feedback-form").on("afterValidate", function () {
        yaCounter30134129.reachGoal("callMe");
        ga("send","event","feedback","call","callMe");
    });

    $("#order-form").on("afterValidate", function () {
        yaCounter30134129.reachGoal("preorderSend");
        ga("send","event","feedback","order","sendOrder");
    });

    $("#shortOrderForm").on("afterValidate", function () {
        yaCounter30134129.reachGoal("preorderSend");
        ga("send","event","feedback","order","sendOrder");
    });


    $("#hamburger").click(function() {
        $(this).toggleClass('is-active');
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
        if (document.getElementById('preorder_form-utm_source')) {
            document.getElementById('preorder_form-utm_source').value = utmLocal.utm_source;
            document.getElementById('preorder_form-utm_medium').value = utmLocal.utm_medium;
            document.getElementById('preorder_form-utm_campaign').value = utmLocal.utm_campaign;
            document.getElementById('preorder_form-utm_term').value = utmLocal.utm_term;
            document.getElementById('preorder_form-utm_content').value = utmLocal.utm_content;
        }
        if (document.getElementById('feedback_form-utm_source')) {
            document.getElementById('feedback_form-utm_source').value = utmLocal.utm_source;
            document.getElementById('feedback_form-utm_medium').value = utmLocal.utm_medium;
            document.getElementById('feedback_form-utm_campaign').value = utmLocal.utm_campaign;
            document.getElementById('feedback_form-utm_term').value = utmLocal.utm_term;
            document.getElementById('feedback_form-utm_content').value = utmLocal.utm_content;
        }
    }


    $('.test-target').click(function(){
        $.ajax({
            url: '/test/target',
            data: {
                id: $(this).data('tid'),
                //url: window.location.toString()
            },
            success: function(data) {
                // process data
            }
        });
    });



    function enableSubmitByRecaptcha(param) {
        $( "#submitBlockedByRecaptcha" ).removeAttr("disabled");
    }

});