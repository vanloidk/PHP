<div class="content-customize02">
    <div class="row label_top_content">
        <h3 class="page-header">Thay đổi mật khẩu</h3>
    </div>
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="row">
        <div class="col-lg-4">

            <div class="form-group">
                <?php echo Form::label("Mật khẩu cũ", 'old_password', array('class' => 'control-label required')); ?>
                <?php echo Form::input('old_password', null, array('class' => 'form-control', 'type' => 'password')); ?>
                <?php echo Form::error('old_password', $err); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label("Mật khẩu mới", 'new_password', array('class' => 'control-label required')); ?>
                <?php echo Form::input('new_password', null, array('class' => 'form-control', 'type' => 'password')); ?>
                <?php echo Form::error('new_password', $err); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label("Xác nhận lại", 'confirm_password', array('class' => 'control-label required')); ?>
                <?php echo Form::input('confirm_password', null, array('class' => 'form-control', 'type' => 'password')); ?>
                <?php
                echo Form::error('confirm_password', $err);
                ?>
            </div>
            <?php echo Form::button('submit', "Lưu", array('class' => 'btn btn-primary')); ?>

        </div>
    </div>
    <?php echo Form::close() ?>

</div>