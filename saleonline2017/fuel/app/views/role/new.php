<div class="content-customize02">
    <h3><?php echo "New"; ?> </h3>
    <hr>
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="container">

        <div class="row">
            <div class="col-lg-1">
                <?php echo Form::label("Name:", 'Name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('name', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-1">
                <?php echo Form::label("Filter:", 'filter', array('class' => "control-label")); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('filter', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-1">
                <?php echo Form::label("User:", 'user id', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('user_id', "", array('class' => 'form-control')); ?>
            </div>
        </div>


        <div class="row"  style="margin-top: 10px; margin-left: 20px;">
            <hr>
            <div class="form-group">
                <?php echo Form::button('submit', "Save", array('class' => 'btn btn-default')); ?>
                <?php echo Html::anchor('role/index', "back", array('class' => 'btn btn-warning')); ?>
            </div>

        </div>
        <?php echo Form::close() ?>
    </div>
</div>