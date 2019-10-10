$(document).ready(function() {

    // calculation check box click in confirm screen
    $(':checkbox').click(function(){
        //block element until ajax call completes
        $('#counter-block').block();

        var requests = [];
        var account_id = $('#account_id').val();

        // loop all current calculation check box
        $(":checkbox").each(function(){
            if ($(this).is(':checked')) {
               requests.push($(this).val());
            }
        });

        // recalculate user's total time of leave
        $.ajax({
            url : base_url + "accounting/recalculate_time_leave",
            type: "POST",
            data:  {account_id: account_id, requests : requests},
            async: true,
            success: function(data) {
                var timeLeave = jQuery.parseJSON(data);
                $('#confirm-history-overtime').html(timeLeave.overTime);
                $('#confirm-history-dayoff').html(timeLeave.dayOff);
                $('#confirm-history-vacation').html(timeLeave.paidVacation);
                //unblock element
                $('#counter-block').unblock();
            },
            error: function(){
                alert(__('confirm_calculate_error'));
            }
        });
    });

    // select month to confirm request -> submit immediately
    var old_confirm_txt_select_month = $('#confirm-txt-select-month').val();
    $('#confirm-txt-select-month').change(function(){
        var new_confirm_txt_select_month = $(this).val();
        if (new_confirm_txt_select_month === '' || old_confirm_txt_select_month === new_confirm_txt_select_month) {
            return;
        }
        $('#confirm-btn-view-month').click();
    });

    // addition click
    $('.counter-add').click(function(){
        calculate($(this), 'add');
    });

    // addition click
    $('.counter-sub').click(function(){
        calculate($(this), 'sub');
    });

    /**
     * calculate day off and over time convert
     *
     * @param  $obj
     * @param {String} $type
     *
     * @author Dao Anh Minh
     */
    function calculate ($obj, $type) {
        // go up to root tr
        var tr = $obj.parent().parent();

        var hours = 4;

        // text box
        var overTime_TextBox = tr.find('.over-time');
        var dayoff_TextBox = tr.find('.day-off');

        // current value in text box
        var overTime = parseFloat(overTime_TextBox.val());
        var dayOff = parseFloat(dayoff_TextBox.val());

        // if text box is empty -> does not calculate
        if (isNaN(overTime) || isNaN(dayOff)) {
            alert (__('counter_list_empty'));
            return;
        }

        //
        var overTime_new;
        var dayOff_new;

        if ($type === 'add') {
            overTime_new = Math.round( (overTime - (hours*60) ) * 100) / 100;
            dayOff_new = Math.round( (dayOff + (hours/8)) * 100) / 100;
        } else {
            overTime_new = Math.round( (overTime + (hours*60) ) * 100) / 100;
            dayOff_new = Math.round( (dayOff - (hours/8)) * 100) / 100;
        }

        overTime_TextBox.val(overTime_new);
        dayoff_TextBox.val(dayOff_new);
    }

    // prevent to enter a value which is not a number
    $('.over-time').keypress(function(e){
        var maxLength = 5;
        return numberOnly($(this), e, maxLength);
    });
    $('.day-off').keypress(function(e) {
        var maxLength = 6;
        return numberOnly($(this), e, maxLength);
    });
    $('.vacation').keypress(function(e) {
        var maxLength = 6;
        return numberOnly($(this), e, maxLength);

    });

    /**
     * allow to enter number only
     *
     * @author Dao Anh Minh
     */
    function numberOnly ($obj, $e, $maxLength)
    {
        // 8  : backsapce
        // 37 : left
        // 39 : right
        // 46 : dot

        var key = $e.which || $e.charCode || $e.keyCode;
        var length = $obj.val().length;

        switch (key) {
            case 8:
            case 37:
            case 39:
                return true;
            case 45:
                if ($obj.val().indexOf('-') === -1 && $e.target.selectionStart === 0) {

                    //press '-' in case exist '.'
                    if ($obj.val().indexOf('.') !== -1 && length < $maxLength + 2) {
                        return true;

                    //press '-' in case not exist '.'
                    } else if ($obj.val().indexOf('.') === -1 && length < $maxLength + 1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            default:
                // allow to enter . and number only
                if (($e.which !== 46 || $obj.val().indexOf('.') !== -1)   && ($e.which < 48 || $e.which > 57)) {
                    return false;
                } else if ($e.which === 46) {
                        //exist '-'
                        if ($obj.val().indexOf('-') !== -1 && length < $maxLength + 2 ) {
                            return true;
                        }
                        //not exits '-'
                        if ($obj.val().indexOf('-') === -1 && length < $maxLength + 1 ) {
                            return true;
                        }
                } else if ($obj.val().indexOf('-') !== -1 && $obj.val().indexOf('.') !== -1 && length < $maxLength + 2) {
                    return true;
                } else if (($obj.val().indexOf('-') !== -1 || $obj.val().indexOf('.') !== -1) && length < $maxLength + 1) {
                    return true;
                } else if (length < $maxLength) {
                    return true
                } else {
                    return false;
                }
        }
    }
});