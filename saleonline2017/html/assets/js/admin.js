$(function () {
    function runIt() {
        $('.restart_animation').animate({opacity: '4'}, 1000);
        $('.restart_animation').animate({opacity: '0.5'}, 1000, runIt);
    }
    runIt();

    $("#group_selected").on('change', function () {
        var group_id = $("#group_selected option:selected").val();
        $.ajax({
            url: base_url + "account/admin/searchgroup/",
            type: "POST",
            async: false,
            dataType: 'html',
            data: {group_id: group_id},
            success: function (data) {
                $("#tbl_listaccount").html(data);

            },
            error: function () {
                alert("error");
            }
        });

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
//    $( "#tags" ).click(function(){
//        alert("aaaa");
//    });



});

function reject_request($account_id, $request_id, $i) {
// confirm reject
    var msgErrorProcess = __('lbl_error_in_process');
    $.ajax({
        url: base_url + "allow/reject_request/",
        type: "POST",
        data: {id: $request_id, account_id: $account_id},
        async: false,
        success: function () {
            $('#approval-row_' + $i).remove();
            $('#requestSubmit').submit();
            // location.reload();
        },
        error: function () {
            alert(msgErrorProcess);
        }
    });
}
