$(function () {
    
    $("ul.paymentoptions > li > div").on('mouseup', function () {

        $(".paymentSelected").each(function () {
            $(this).removeClass("paymentSelected");
        });
        $(this).addClass("paymentSelected");

        //$(this).find("input").trigger('click');
        // $("input[name=dummypaymentoptions]").prop('checked', false);

        $(this).find('input').prop('checked', true);

    });

    $("#user_selected").on('change', function () {
        var user_id = $("#user_selected option:selected").val();
        $.ajax({
            url: base_url + "actions/loadactions/",
            type: "POST",
            async: false,
            dataType: 'html',
            data: {user_id: user_id},
            success: function (data) {

                $("#tbl_actions").html(data);
            },
            error: function () {
                alert("error");
            }
        });

    });

});
