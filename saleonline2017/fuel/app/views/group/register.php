
<div class="content-customize02">

    <h3 class="page-header header_custom" >
        <?php echo "Register Group"; ?>
    </h3>
    <div class="col-lg-8">
        <?php echo Form::open(array('role' => 'form')); ?>
        <div class="row">
            <div class="col-lg-3">
                <?php echo Form::label("Group Name", 'name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-8 col-lg-offset-0">
                <?php echo Form::input('name', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-3">
                <?php echo Form::label("User Group", 'user_id', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-8 col-lg-offset-0">
                <?php echo Form::input('user_id', "", array('class' => 'form-control')); ?>
            </div>

        </div>
    </div>
    <?php require_once '_form.php'; ?>

    <div class="row"  style="margin-top: 10px; margin-left: 20px;">
        <div class="form-group">
            <?php echo Form::button('Register', __('common.'), array('class' => 'btn btn-default')); ?>
            <?php echo Html::anchor('group', "back", array('class' => 'btn btn-warning')); ?>
        </div>
    </div>
</div>
<?php echo Form::close() ?>