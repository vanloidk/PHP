<div class="content-customize02">
    <div class="col-lg-8">
        <?php echo Form::open(array('role' => 'form')); ?>
        <div class="row">
            <div class="col-lg-2">
                <?php echo Form::label("name", 'name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-8 col-lg-offset-0">
                <?php echo Form::input('name', $group->name, array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("User", 'user_id', array('class' => 'control-label')); ?>
            </div>
            <a href="../account/admin/edit.php"></a>
            <div class="col-lg-8 col-lg-offset-0">
                <?php echo Form::input('user_id', $group->user_id, array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>


    <?php require_once '_form.php'; ?>

    <div style="margin-left: 20px;">
        <div class="form-group">
            <?php echo Form::button('Update', __('common.'), array('class' => 'btn btn-default')); ?>
            <?php echo Html::anchor('group', "back", array('class' => 'btn btn-warning')); ?>
        </div>
    </div>

</div>
<?php echo Form::close() ?>