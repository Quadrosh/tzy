$(document).ready(function() {
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
    $("#feedback-form").on("afterValidate", function () {
        yaCounter30134129.reachGoal("callMe");
        ga("send","event","feedback","call","callMe");
    });

    $("#order-form").on("afterValidate", function () {
        yaCounter30134129.reachGoal("preorderSend");
        ga("send","event","feedback","order","sendOrder");
    });


});