$(function () {

    //hide uncheck groups in primary group select
    $('.groups-check').each(function(index,obj){
        var $obj = $(obj);
        if(!$obj.is(':checked')){
            $('#form_primary_group option[value="'+$obj.val()+'"]').prop('disabled', true);
        }
    });

    function autoSelectPrimaryGroup(){
        var group_checked = $('.groups-check:checked');
        //1 group checkbox checked
        if(group_checked.length === 1){
            //hide primary group select
            $('#form_primary_group').val(group_checked.val());
        }
    }

    //check on group checkbox
    $('.groups-check').change(function(){
        var $this = $(this);
        var relate_option = $('#form_primary_group option[value="'+$this.val()+'"]');
        if($this.is(':checked')){
            relate_option.prop('disabled', false);
        } else {
            relate_option.prop('disabled', true);
            //if uncheck selected => select none
            if(relate_option.is(':selected')){
                $('#form_primary_group').prop('selectedIndex',0);
            }
        }

        //onchange checkbox selected
        autoSelectPrimaryGroup();
    });

    // confirm to lock group
    $('#form_lock').click(function () {
        if ($(this).is(':checked')) {
            if (confirm(__('warning_lock_label').format(__('account')))) {
                return true;
            } else {
                return false;
            }
        }
    });
});