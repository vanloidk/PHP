//disable button approval all if not have request approval
if (parseInt(number_request_approval) === 0)
{
    $('#sbApprovalAll').attr('disabled', 'disabled');
} else {
    $('#sbApprovalAll').removeAttr('disabled');
}

$(function () {
    var old_date_input = $('#date_input').val();
    $('#date_input').change(function () {
        var new_date_input = $(this).val();
        if ($(this).val() === '' || old_date_input === new_date_input) {
            return;
        }
        $('#requestSubmit').submit();
    });
    // get day pre
    $('#approval-pre-month').click(function () {
        var date_input = $('#date_input').attr('value');
        var year_input = "0000";
        var month_input = "00";
        if (date_input !== '')
        {
            year_input = date_input.split('/')[0];
            month_input = date_input.split('/')[1];
        }
        var month_pre = (parseInt(month_input) - 1);
        if (month_pre < 10)
        {
            month_pre = "0" + month_pre;
        }
        var year_pre = year_input;
        if (month_pre == 0)
        {
            year_pre = year_pre - 1;
            month_pre = 12;
        }
        $('#date_input').val(year_pre + '/' + month_pre);
        $('#requestSubmit').submit();
    });
    // get day next
    $('#approval-next-month').click(function () {
        var date_input = $('#date_input').attr('value');
        var year_input = "0000";
        var month_input = "00";
        if (date_input !== '')
        {
            year_input = date_input.split('/')[0];
            month_input = date_input.split('/')[1];
        }
        var month_next = (parseInt(month_input) + 1);
        if (month_next < 10)
        {
            month_next = "0" + month_next;
        }
        var year_next = year_input;
        if (month_next > 12)
        {
            year_next = parseInt(year_next) + 1;
            month_next = "01";
        }
        $('#date_input').val(year_next + '/' + month_next);
        $('#requestSubmit').submit();
    });
    //get now day
    $('#approval-cur-month').click(function () {
        var now_day = new Date();
        var year_date = now_day.getFullYear();
        var month_date = now_day.getMonth() + 1;
        if (month_date < 10)
        {
            month_date = "0" + month_date;
        }
        $('#date_input').val(year_date + '/' + month_date);
        $('#requestSubmit').submit();
    });
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
function approval_all_request(lstRequest) {
    var msgErrorProcess = __('lbl_error_in_process');
    if (lstRequest.length <= 0)
    {
        $('#sbApprovalAll').attr("type", "button");
        exit();
    }
    $.ajax({
        url: base_url + "allow/approval_all_request/",
        type: "POST",
        data: {lstRequest: lstRequest},
        async: false,
        success: function () {
            for (var i = 1; i < lstRequest.length; i++)
            {
                $('#approval-row_' + i).remove();
            }
            $('#requestSubmit').attr('POST', 'location.href').off('submit').submit();
        },
        error: function () {
            alert(msgErrorProcess);
        }
    });
}