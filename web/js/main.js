$(document).ready(function() {
    $('.test-target').click(function(){
        //alert('alert');
        //$.post("target",
        //    {
        //        id: "6"
        //    },
        //    function(data, status) {
        //        alert("Data: " + data + "\nStatus: " + status);
        //    }
        //);
        $.ajax({
            url: '/test/target',
            data: {id: $(this).data('tid')},
            success: function(data) {
                // process data
            }
        });



    });

});