<div class="contents">
    <div class="row">
        <h3 class="page-header header_custom"><?php echo __('common.:label_edit_header', array('label' => __('common.position'))); ?></h3>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="" method="post" class="form-horizontal" role="form" accept-charset="utf-8">
                <div style="display: none" >
                    <?php
                    echo Form::input('id', $shiftPosition['id'], array('class' => 'form-control', 'type' => 'hidden'));
                    ?>
                </div>
                <div class="form-group">
                    <label class="control-label required" for="form_account"><?php echo __('shift.position_name') ?></label>
                    <?php
                    echo Form::input('position_name', Input::post('position_name', isset($shiftPosition) ? $shiftPosition->position_name : ''), array('class' => 'form-control', 'type' => 'text'));
                    ?>
                    <?php
                    echo Form::error('position_name', $error);
                    ?>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <?php
                                $lock_checked = false;
                                if (Input::post()) {
                                    $lock_checked = (Input::post('lock') != null);
                                } else {
                                    $lock_checked = ($shiftPosition['lock'] == 1);
                                }
                            ?>
                            <?php echo Form::checkbox('lock', 'lock', $lock_checked, array('id' => 'lock_position')); ?>
                            <?php echo __('common.lock') ?>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" value="submit" class="btn btn-default"><?php echo __('common.edit') ?></button>
                    <a href="<?php echo Uri::base() ?>position/index" class="btn btn-warning"><?php echo __('common.cancel') ?></a>
                </div>
            </form>
        </div>
    </div>
</div>