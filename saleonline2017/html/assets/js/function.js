//language
function __(key) {
    if (typeof (language) !== 'undefined' && language[key]) {
        return language[key];
    }
    return key;
}

$(function () {

    $("#formUpload").on('submit', (function (e) {
        var btn = $(this).find("input[type=submit]:focus").val();
        if (btn == "Upload")
        {
            e.preventDefault();
            $.ajax({
                url: base_url + "sale/laptop/upload/",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#image_dtl").attr("src", base_url + "assets/img/" + data);
                },
                error: function () {
                    alert("error");
                }
            });
        }
    }));

    // confirm to lock group
    $('#groupLock').click(function () {
        if ($(this).is(':checked')) {
            if (confirm(__('warning_lock_label').format(__('group')))) {
                return true;
            } else {
                return false;
            }
        }
    });
    // confirm delete
    $('.confirmDelete').click(function () {
        if (confirm(__('confirm_delete'))) {
            return true;
        } else {
            return false;
        }
    });
    //allow only selected month, not allow to input month
    $('.selectmonth').prop('readonly', true);
    // select month
    $('.selectmonth').datepicker({
        startView: 1,
        minViewMode: 1,
        todayBtn: 'linked',
        autoclose: true,
        format: 'yyyy/mm',
        language: 'ja'
    });
    // select day
    $('.selectDay').datepicker({
        startView: 0,
        minViewMode: 0,
        todayBtn: 'linked',
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,
        language: 'ja'
    });
    // allow user select two previous month and last date of next year to leave a request
    if (typeof (startDate) != "undefined" && typeof (endDate) != "undefined") {
        $('.selectmonth').datepicker('setStartDate', new Date(startDate));
        $('.selectmonth').datepicker('setEndDate', new Date(endDate));
    }

//select time
    $(document).on('focus', 'input.selectTime', function () {
        startTimePicker($(this));
    });
    function startTimePicker($obj) {
        var $input = $obj.find('input');
        if (moment($input.val(), "HH:mm").isValid()) {
            $obj.datetimepicker({
                pickDate: false,
                format: 'HH:mm',
                pick12HourFormat: false,
                language: 'ja',
                useCurrent: false
            });
        } else {
            var value = $input.val();
            $input.val('');
            $obj.datetimepicker({
                pickDate: false,
                format: 'HH:mm',
                pick12HourFormat: false,
                language: 'ja',
                useCurrent: false
            });
            $input.val(value);
        }
    }
    //Request history - Submit when change month-value
    var old_history_month = $('#history-month').val();
    $('#history-month').change(function () {
        var new_history_month = $(this).val();
        if ($(this).val() === '' || old_history_month === new_history_month) {
            return;
        }
        $("form#request-history").submit();
    });
    //Request history - Submit when change month-value
    $('#history-select-type').change(function () {
        $("form#request-history").submit();
    });
    var names = ["Jörn Zaefferer", "Scott González", "John Resig"];
    var accentMap = {
        "á": "a",
        "ö": "o"
    };
    var normalize = function (term) {
        var ret = "";
        for (var i = 0; i < term.length; i++) {
            ret += accentMap[ term.charAt(i) ] || term.charAt(i);
        }
        return ret;
    };
    $("#datepicker").datepicker(
            {
                viewMode: 'months',
                format: 'mm',
                minViewMode: 'months'
            });


    //shoping cart change

    $("#bd_cart").change(function () {
        var numProduct = $(this).attr("value");
        var ttl_qty = 0;
        for (var i = 0; i < numProduct; i++)
        {
            var ttlQty = parseInt($("#item_" + i).val()) * parseFloat($("#price_" + i).val());
            if (!isNaN(ttlQty))
            {
                $("#qty_" + i).val(ttlQty);
            } else {
                $("#qty_" + i).val(0);
            }

            ttl_qty += parseFloat($("#qty_" + i).val());
        }
        $("#ttlProduct").val(ttl_qty);

    });

    //change border color product
    $(".padding-product .thumbnail").mouseover(function () {
        $(this).css('border-color', '#B8E834');
    });
    
    $(".padding-product .thumbnail").mouseleave(function () {

        $(this).css('border-color', '#9e9690');
    });

 

});

