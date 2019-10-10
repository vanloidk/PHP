<div class="contents">
    <div class="row">
        <h3 class="page-header header_custom"><?php echo __('common.:label_register_header', array('label' => __('common.position'))); ?></h3>
    </div>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="" method="post" class="form-horizontal" role="form" accept-charset="utf-8">
                <div class="form-group">
                    <label class="control-label required" for="form_account"><?php echo __('shift.position_name'); ?></label>
                    <input id="" class="form-control" type="text" name="position_name" value="<?php echo Input::post('position_name'); ?>">
                    <?php
                        echo Form::error('position_name', $error);
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" value="submit" class="btn btn-default"><?php echo __('common.btn_submit') ?></button>
                    <a href="<?php echo Uri::base() ?>position/index" class="btn btn-warning"><?php echo __('common.cancel') ?></a>
                </div>
            </form>
        </div>
    </div>

</div>