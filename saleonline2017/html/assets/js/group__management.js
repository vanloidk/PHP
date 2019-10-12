$(document).ready(function(){

    if ($("#group-select-worktime").is(":checked")) { //select shift work
        // allow select shift work time
        showShiftWork();
        // allow select shift position
        showShifPosition();
        // can not select holiday
        hideHolidayFlag();

    } else { //don't select shift work
        // can not select shift work time
        hideShiftWork();
        // can not select shift position
        hideShiftPosition()
        // allow enter opening time, closing time and select holiday
        showHolidayFlag();
    }

    // When select shift work or not shift work
    $('input[name="shiftwork_flag"]:radio').change(function(){
        if ($("#group-select-worktime").is(":checked")) {
            showShiftWork();
            showShifPosition()
            hideHolidayFlag();
        } else {
            hideShiftWork();
            hideShiftPosition()
            showHolidayFlag();
        }
    });

    /**
     * Show and hide shift work time
     *
     * @author Nguyen Van Loi
     */
    function showShifPosition()
    {
        $('#select-shift-position-box').fadeIn(500);
        $('input[name=shift_position]').attr("disabled",false);
    }
    /**
     * Show and hide shift work time
     *
     * @author Nguyen Van Loi
     */
    function hideShiftPosition()
    {
        $('#select-shift-position-box').hide();
        $('input[name=shift_position]').attr("disabled",true);
    }
    /**
     * Show and hide shift work time
     *
     * @author Nguyen Van Loi
     */
    function showShiftWork()
    {
        $('#select-work-time-box').fadeIn(500);
        $('input[name=shiftwork]').attr("disabled",false);

        // input opening time and closing time
        $('#rd-opening-time').prop('disabled',true);
        $('#rd-closing-time').prop('disabled',true);
        $('#type-work-time-box').hide();
    }

    /**
     * Hide shift work
     *
     * @author Nguyen Van Loi
     */
    function hideShiftWork()
    {
        $('#select-work-time-box').hide();
        $('input[name=shiftwork]').attr("disabled",true);

        // input opening time and closing time
        $('#rd-opening-time').prop('disabled',false);
        $('#rd-closing-time').prop('disabled',false);
        $('#type-work-time-box').fadeIn(500);
    }

    /**
     * Show holiday flag
     *
     * @author Nguyen Van Loi
     */
    function showHolidayFlag()
    {
        $('#holiday-flag-box').fadeIn(500);

        // do not prevent post holiday flag value
        $('#holiday-flag-box :input').each(function(){
            $(this).prop('disabled',false);
        });
    }

    /**
     * Hide holiday flag
     *
     * @author Nguyen Van Loi
     */
    function hideHolidayFlag()
    {
        $('#holiday-flag-box').hide();

        // prevent post holiday flag value
        $('#holiday-flag-box :input').each(function(){
            $(this).prop('disabled',true);
        });
    }

});