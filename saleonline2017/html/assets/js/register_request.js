$(function() {
    //click in checkbox in cell of day
    $('.calendar input[type=checkbox]').click(function() {
        //block page until ajax call completes
        $.blockUI();

        var id = $(this).attr('id');
        if ($(this).is(':checked')) {
            //allow check only one checkbox
            var checkboxes = $(this).parent().parent().find('input[type=checkbox]');
            checkboxes.prop("checked", false);
            $(this).prop("checked", true);
        } else {
            $('#input-block #request_' + id).remove();
        }

        //display corresponding input block
        var request_type_id = $('#request_type_id').val();
        $.ajax({
            url : base_url + "request/register/" + request_type_id,
            type: "POST",
            data: $('#register-request-form').serialize(),
            async: true,
            success: function(data) {
                $( "#input-block-main" ).replaceWith(data);
            }
        });
    });

    // recalculation height of each cell of day in week.
    $('.cal-before-eventlist').each(function(){
       var maxHeight = $(this).height();
       $(this).find('.cal-cell').each(function(){
          $(this).height(maxHeight);
       });
    });

    // register request screen: After select month to view -> submit immediately
    var old_txt_select_month = $('#txt-select-month').val();
    $('#txt-select-month').change(function(){
        var new_txt_select_month = $(this).val();
        if ($(this).val() === '' || old_txt_select_month === new_txt_select_month) {
            return;
        }
         $('#btn-view-month').click();
    });

    $('.approved-request').unbind('mouseenter mouseleave');

    //prevent from multiple-clicking register-request button
    $(document).on('click', '#submit-requests', function() {
        $('#submit-box').block({ message: null });
        $("form#register-request-form").submit();
    });
});
