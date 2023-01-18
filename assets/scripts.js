
jQuery(document).ready(function(e){
    $(document).on('click','#add_btn', function(e){
        var address = $("#address").val();
        $.ajax({    
            url: "lib/fetchData.php",
            data:{"address":address},
            method:'post',
            async: true,
            dataType: 'json',
            beforeSend: function() {
                $('#loader').show();
                $('#result').hide();
                $('#loader').html('<span><img src="loading.gif"><span>');
            },
            success: function (data) {
                $('#loader').hide();
                $('#result').show();
                $("#location_map").attr("src", "");
                if(data.status == false){
                    alert(data.message);
                    $("#lon").html(" _ _");
                    $("#lat").html(" _ _");
                }else{
                    $("#location_map").attr("src", "https://maps.google.com/maps?q="+address+"&output=embed");
                    $("#lon").html(data.longitude);
                    $("#lat").html(data.latitude);
                }
            }
        });
    });

    jQuery('.locations').on('click', function(e) {
        var location_src = $(this).closest(".card-body").find(".location_src").val();
        var location_name = $(this).closest(".card-body").find(".location_name").val();
        $(".modal-body #location_map").attr("src", location_src);
        $("#modal_title").html(location_name);
        $('#locationModal').modal('show'); 
    });
});