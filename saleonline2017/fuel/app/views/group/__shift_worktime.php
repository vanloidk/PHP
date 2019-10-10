
<!--if select shift work-time-->
<div id="select-work-time-box" class="form-group">
    <label class="control-label required" for="form_account"><?php echo __('group.worktime') ?></label>

    <!--Display all work-time-->
    <?php
    // if edit group
    if (!isset($selected_shift_work_time)) {
        $selected_shift_work_time = array();
    }

    // get shift work time from post
    $post_value = Input::post();
    if (isset($post_value['shiftwork'])) {
        $post_shift_work  = Input::post('shiftwork');
    } else {
        $post_shift_work  = array();
    }

    foreach ($all_work_time as $key => $val):
        $value = $val['shiftwork_name'] . ' ' . date('H:i',  strtotime($val['opening_time'])) . ' - ' . date('H:i', strtotime($val['closing_time']));

        // keep checked box after POST if validate failure OR checked in selected box when edit group
        if (in_array($val['id'], $post_shift_work) OR (in_array($val['id'], $selected_shift_work_time) AND ! Input::post() )) {
            $checked_box = TRUE;
        } else {
            $checked_box = FALSE;
        }
    ?>

    <div class="checkbox">
        <label>
            <?php echo Form::checkbox('shiftwork[]', $val['id'], $checked_box); ?>
            <!--check box's title-->
            <?php echo $value; ?>
        </label>
    </div>

    <?php endforeach; ?>

<?php echo Form::error('shiftwork', $error) ?>
</div>


<?php
// take opening time and closing time value
if (Input::post('opening_time') or Input::post('closing_time')) {
    $opening_time = Input::post('opening_time');
    $closing_time = Input::post('closing_time');
} elseif (isset($edit_group) AND $edit_group['shiftwork_flag'] == NOT_SHIFT_WORKING) {
    $opening_time = date('H:i',strtotime($edit_group['opening_time']));
    $closing_time = date('H:i',strtotime($edit_group['closing_time']));
} else {
    $opening_time = '';
    $closing_time = '';
} ?>

<!--type work-time manual-->
<div id="type-work-time-box">
    <div class="form-group" id="opening-time">
        <label class="control-label required" for="form_account"><?php echo __('group.opening_time') ?></label>
        <?php echo Form::input('opening_time', $opening_time, array(
            'id' => 'rd-opening-time',
            'class' => 'form-control selectTime',
            'placeholder' => 'HH:MM',
            'autocomplete' => 'off'
        )) ?>

        <!--error validate-->
        <?php echo Form::error('opening_time', $error) ?>
    </div>

    <div class="form-group" id="closing-time">
        <label class="control-label required" for="form_account"><?php echo __('group.closing_time') ?></label>
        <?php echo Form::input('closing_time', $closing_time, array(
            'id' => 'rd-closing-time',
            'class' => 'form-control selectTime',
            'placeholder' => 'HH:MM',
            'autocomplete' => 'off'
        )) ?>

        <!--error validate-->
        <?php echo Form::error('closing_time', $error) ?>
    </div>

</div>