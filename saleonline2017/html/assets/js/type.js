$(function () {
    $('#request-more-item-add').click(function () {
        var num = $('.request-item').length - 2;
        var new_num = num + 1;
        //set value item order
        var value_item_order = parseInt(max_order_request) + parseInt(new_num);
        //clone
        var new_elem = $('#requestitem-1').clone().attr('id', 'requestitem' + new_num).fadeIn('slow');
        //set index for new item
        new_elem.find('#request-more-item-remove').attr('number', new_num);
        //item name
        new_elem.find('#item_name').attr('name', 'requestitems[' + new_num + "][input_name]");
        new_elem.find('#item_name').attr('value', ''); //val('');
        //input type
        new_elem.find('#input_type').attr('name', 'requestitems[' + new_num + "][input_type]");
        new_elem.find('#input_type').attr('value', "item_option_" + new_num);
        new_elem.find('#input_type select').val('0');
        //requied flag
        new_elem.find('#required_flag').attr('name', 'requestitems[' + new_num + "][required_flag]");
        new_elem.find('#required_flag').attr('checked', null);
        //option
        new_elem.find('#option').attr('name', 'requestitems[' + new_num + "][option]");
        new_elem.find('#item_option_-1').attr('id', 'item_option_' + new_num);
        //item_order
        new_elem.find('#item_order').attr('name', 'requestitems[' + new_num + "][item_order]");
        new_elem.find('#item_order').attr('value', value_item_order);
        $('.request-items-container').append(new_elem);
    });

    /**
     * Limit the value of value-select-type & request-date-type
     * when selected a value of date-select-type
     *
     * @author Nguyen Van Hiep
     */
    if ($('#date-select-type').val() === '1') { // shift-check-box
        // Value-select-type
        $('#value-select-type option[value="0"]').prop('disabled', true);
        $('#value-select-type option[value="1"]').prop('disabled', true);
        $('#value-select-type option[value="2"]').prop('selected', true);

        // Request-date-type
        $('#request-date-type option[value="0"]').prop('selected', true);
        $('#request-date-type option[value="1"]').prop('disabled', true);
        $('#request-date-type option[value="2"]').prop('disabled', true);
    } else { // check-box
        // Value-select-type
        $('#value-select-type option[value="0"]').prop('disabled', false);
        $('#value-select-type option[value="1"]').prop('disabled', false);
        $('#value-select-type option[value="2"]').prop('disabled', false);

        // Request-date-type
        $('#request-date-type option[value="0"]').prop('disabled', false);
        $('#request-date-type option[value="0"]').prop('selected', true);
        $('#request-date-type option[value="1"]').prop('disabled', false);
        $('#request-date-type option[value="2"]').prop('disabled', false);
    }
    // When changing value
    $('#date-select-type').change(function () {
        var val = $(this).val();
        if (val === '1') { // shift-check-box
            // Value-select-type
            $('#value-select-type option[value="0"]').prop('disabled', true);
            $('#value-select-type option[value="1"]').prop('disabled', true);
            $('#value-select-type option[value="2"]').prop('selected', true);

            // Request-date-type
            $('#request-date-type option[value="0"]').prop('selected', true);
            $('#request-date-type option[value="1"]').prop('disabled', true);
            $('#request-date-type option[value="2"]').prop('disabled', true);
        } else { // check-box
            // Value-select-type
            $('#value-select-type option[value="0"]').prop('disabled', false);
            $('#value-select-type option[value="0"]').prop('selected', true);
            $('#value-select-type option[value="1"]').prop('disabled', false);
            $('#value-select-type option[value="2"]').prop('disabled', false);

            // Request-date-type
            $('#request-date-type option[value="0"]').prop('disabled', false);
            $('#request-date-type option[value="0"]').prop('selected', true);
            $('#request-date-type option[value="1"]').prop('disabled', false);
            $('#request-date-type option[value="2"]').prop('disabled', false);
        }

        //set group can check
        setGroupCanCheck();
    });

    //set group can check
    setGroupCanCheck();

    /**
     * Confirm lock type
     *
     * @author Nguyen Van Loi
     */
    $('#lockRequest').click(function () {
        var messageLock = __('warning_lock_label').format(__('type'));
        if ($(this).is(':checked')) {
            return confirm(messageLock);
        }
    });
    //counter select
    $('#form_target_counter').change(function () {
        if ($(this).val() == 0) {
            $('#form_calculation').attr('disabled', 'disabled');
            $("#calculation").css("display", "none");
        } else {
            $("#calculation").css("display", "block");
            $('#form_calculation').removeAttr('disabled');
        }
    });
});

$("#sortable1").sortable({
    connectWith: ".connectedSortable",
    receive: function (e, ui) {
        ui.item.find("input.available").attr("disabled", true);
    }
}).disableSelection();
$("#sortable2").sortable({
    connectWith: ".connectedSortable",
    receive: function (e, ui) {
        ui.item.find("input.available").attr("disabled", false);
    }

}).disableSelection();
function remove_entry(val) {
    var num = parseInt($(val).attr('number'));
    var max_number = $('.request-item').length - 1;

    //set order of item
    for (i = num; i < max_number; i++)
    {
        //item name
        var new_item = i + 1;
        //set index for new item
        $('#requestitem' + new_item).find('#request-more-item-remove').attr('number', i);
        $('#requestitem' + new_item).find('#item_name').attr('name', 'requestitems[' + i + "][input_name]");
        //input type
        $('#requestitem' + new_item).find('#input_type').attr('name', 'requestitems[' + i + "][input_type]");
        $('#requestitem' + new_item).find('#input_type').attr('value', "item_option_" + i);
        //requied flag
        $('#requestitem' + new_item).find('#required_flag').attr('name', 'requestitems[' + i + "][required_flag]");
        //option
        $('#requestitem' + new_item).find('#option').attr('name', 'requestitems[' + i + "][option]");
        $('#item_option_' + new_item).attr('id', 'item_option_' + i);
        //item_order
        $('#requestitem' + new_item).find('#item_order').attr('name', 'requestitems[' + i + "][item_order]");
        $('#requestitem' + new_item).attr('id', 'requestitem' + i);
    }
    $(val).closest('.request-item').remove();
    return false;
}
// display option item
function showItemOption(inputType)
{
    var index = $(inputType).val();
    var inputOptionCheckError = $(inputType).attr("using_check_error_option");
    var inputOption = $(inputType).attr("value");
    if (index === "2") {
        $("#" + inputOption).fadeIn(300);
    } else {
        $("#" + inputOption).hide();
        $("#" + 'item_option_error_' + parseInt(inputOptionCheckError)).remove();
    }
}

//set group can check
function setGroupCanCheck(){
    //select all
    if($('#date-select-type').val() == 0){
        $('.select-group input[shiftwork="0"]').prop('disabled', false).closest('div.checkbox').show();
    }else{//type = 1 => select shift
        $('.select-group input[shiftwork="0"]').prop('disabled', true).prop('checked', false).closest('div.checkbox').hide();
    }

}