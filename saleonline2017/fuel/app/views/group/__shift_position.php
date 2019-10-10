<div class="form-group" id="select-shift-position-box">
    <label class="control-label required" for="form_account"><?php echo __('common.position') ?></label>

    <?php
    // if edit group
    if (!isset($selected_shift_position)) {
        $selected_shift_position = array();
    }

    // get shift positon from POST value
    $post_shift_position = Input::post();
    if (isset($post_shift_position['shift_position'])) {
        $position = $post_shift_position['shift_position'];
    } else {
        $position = array();
    }

    foreach ($all_positions as $pos):
        // keep checked position after POST or checked into positon when edit
        if (in_array($pos['id'], $position) OR (in_array($pos['id'], $selected_shift_position) AND !Input::post())) {
            $checked_position = TRUE;
        } else {
            $checked_position = FALSE;
        }
    ?>

    <div class="checkbox">
        <label>
            <?php echo Form::checkbox('shift_position[]', $pos['id'], $checked_position); ?>
            <!--check box's title-->
            <?php echo $pos['position_name']; ?>
        </label>
    </div>

    <?php endforeach; ?>

    <!--validate error-->
    <?php echo Form::error('shift_position', $error); ?>
</div>