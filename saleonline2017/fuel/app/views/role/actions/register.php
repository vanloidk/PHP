<div class="content-customize02">
    <h3 class="page-header"><?php echo "Register"; ?></h3>
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="container">

        <div class="row">
            <div class="col-lg-2">
                <?php echo Form::label("Area", 'Area', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('area', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("permission", '$permission', array('class' => "control-label")); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('permission', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("description", '$description', array('class' => "control-label")); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('description', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Action", 'actions', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('actions', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("user id", 'user id', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('user_id', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 10px; margin-left: 20px;">
            <hr>
            <div class="form-group">
                <?php echo Form::button('submit', "Save", array('class' => 'btn btn-default')); ?>
                <?php echo Html::anchor('actions/index', "back", array('class' => 'btn btn-warning')); ?>
            </div>

        </div>
        <?php echo Form::close() ?>
    </div>
</div>