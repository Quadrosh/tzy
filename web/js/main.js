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

});