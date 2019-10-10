<?php echo Form::open(array('role' => 'form')); ?>
<div class="row" style="background: #5bc0de; padding-left: 15px; margin-bottom: 10px;">
    <img src="<?php echo Uri::base() . "assets/imglogin/lock.ico" ?>" style="width: 40px; height: 40px;"/>
    <h4 class="header_custom"><?php echo "Thông tin đăng nhập"; ?></h4>
</div>
<div class="row">
    <div class="col-lg-2">
        <?php echo Form::label("Tên đăng nhập", 'username', array('class' => 'control-label required')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('username', "", array('class' => 'form-control')); ?>
        <?php echo Form::error('username', $err); ?>
    </div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Email", 'email', array('class' => 'control-label required')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('email', "", array('class' => 'form-control')); ?>
        <?php echo Form::error('email', $err); ?>
    </div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Mật khẩu", 'passwd', array('class' => "control-label")); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('passwd', "", array('class' => 'form-control', 'type' => 'password')); ?>
    </div>
</div>


<div class="row" style="background: #5bc0de; padding-left: 15px; margin-top: 10px;">
    <img src="<?php echo Uri::base() . "assets/imglogin/user_info.ico" ?>" style="width: 40px; height: 40px; margin-top: -20px;"/>
    <h4 class="header_custom"><?php echo "Thông tin liên hệ"; ?></h4>
</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Họ tên", 'first_name', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('deliveryName', "", array('class' => 'form-control')); ?>
    </div>

</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Phái", 'last_kana', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php
        echo Form::radio('gender', 'male', true);
        echo Form::label('Nam', 'gender');
        echo " ";
        echo Form::radio('gender', 'female');
        echo Form::label('Nữ', 'gender');
        ?>
    </div>
</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Ngày sinh", 'birthday', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('birthday', "", array('class' => 'form-control')); ?>
    </div>
</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Đơn vị công tác", 'company', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('company', "", array('class' => 'form-control')); ?>
    </div>
</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Điện thoại", 'first_kana', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('phone', "", array('class' => 'form-control')); ?>
    </div>
</div>
<div class="row"  style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Điện chỉ", 'first_kana', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-5 col-lg-offset-0">
        <?php echo Form::input('address', "", array('class' => 'form-control')); ?>
    </div>
</div>
<div class="row" style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Thành phố", 'first_kana', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-4">
        <?php echo Form::select('city', 'none', $city, array('class' => 'form-control', 'style' => 'width:300px;'));
        ?>
    </div>

</div>
<div class="row" style="margin-top: 5px;">
    <div class="col-lg-2">
        <?php echo Form::label("Quận", 'first_kana', array('class' => 'control-label')); ?>
    </div>
    <div class="col-lg-2" >
        <?php echo Form::select('district', 'none', array("Tân bình", 'bình thạnh', 'Quận 1', 'Quận 2', 'Quận 3', 'Quận 4'), array('class' => 'form-control', 'style' => 'width:200px;'));
        ?>
    </div>
</div>
<div class="row"  style="margin-top: 20px; margin-left: 17%;">
    <div class="form-group">
        <?php echo Form::button('submit', "Đăng ký", array('class' => 'btn btn-primary')); ?>
        <?php echo Html::anchor('product/', "Quay lại", array('class' => 'btn btn-warning')); ?>
    </div>

</div>

<?php echo Form::close() ?>
