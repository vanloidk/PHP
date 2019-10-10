<?php
foreach ($account->delivery as $value) {
    $delivery = $value;
}
?>

<div class="content-customize02">
    <div class="row clearfix">
        <h3 class="page-header">Thông tin user</h3>
    </div>
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="row" style="background: #5bc0de; padding-left: 15px;">
        <img src="<?php echo Uri::base() . "assets/imglogin/lock.ico" ?>" style="width: 40px; height: 40px;"/>
        <h4 class="header_custom"><?php echo "Thông tin đăng nhập"; ?></h4>
    </div>
    <div class="row" style="padding-top: 10px;">
        <div class="col-lg-2">
            <?php echo Form::label("Tên đăng nhập", 'username', array('class' => 'control-label required')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('username', !empty($account->username) ? $account->username : "", array('class' => 'form-control')); ?>
            <?php echo Form::error('username', $err); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Email", 'email', array('class' => 'control-label required')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('email', !empty($account->email) ? $account->email : "", array('class' => 'form-control')); ?>
            <?php echo Form::error('email', $err); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Mật khẩu", 'passwd', array('class' => "control-label")); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('passwd', !empty($account->password) ? $account->password : "", array('class' => 'form-control', 'type' => 'password')); ?>
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
            <?php echo Form::input('deliveryName', !empty($delivery->first_name) ? $delivery->first_name : "", array('class' => 'form-control')); ?>
        </div>

    </div>
    <div class="row"  style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Phái", 'last_kana', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php
            $genFemale = false;
            $genMale   = false;
            
                if ($delivery->gender == 1) {
                    $genMale = true;
                } else {
                    $genFemale = true;
                }
            //}

            echo Form::radio('gender[]', 1, $genMale);
            echo Form::label('Nam', 'gender');
            echo " ";
            echo Form::radio('gender[]', 0, $genFemale);
            echo Form::label('Nữ', 'gender');
            ?>
        </div>
    </div>
    <div class="row"  style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Ngày sinh", 'birthday', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('birthday', !empty($delivery->born_date) ? date('Y-m-d', strtotime($delivery->born_date)) : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row"  style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Đơn vị công tác", 'company', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('company', !empty($delivery->company) ? $delivery->company : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row"  style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Điện thoại", 'phone', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('phone', !empty($delivery->phone) ? $delivery->phone : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row"  style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Điện chỉ", 'address', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-5 col-lg-offset-0">
            <?php echo Form::input('address', !empty($delivery->address_1) ? $delivery->address_1 : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Thành phố", 'city', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-4">
            <?php echo Form::select('city', "", $city, array('class' => 'form-control', 'style' => 'width:300px;'));
            ?>
        </div>

    </div>
    <div class="row" style="margin-top: 5px;">
        <div class="col-lg-2">
            <?php echo Form::label("Quận", 'district', array('class' => 'control-label')); ?>
        </div>
        <div class="col-lg-2" >
            <?php echo Form::select('district', "", array("Tân bình", 'bình thạnh', 'Quận 1', 'Quận 2', 'Quận 3', 'Quận 4'), array('class' => 'form-control', 'style' => 'width:200px;'));
            ?>
        </div>
    </div>
    <div class="row"  style="margin-top: 20px; margin-left: 17%;">
        <div class="form-group">
            <?php echo Form::button('submit', "Cập nhật", array('class' => 'btn btn-primary')); ?>
            <?php echo Html::anchor('product/', "Quay lại", array('class' => 'btn btn-warning')); ?>
        </div>

    </div>

    <?php echo Form::close() ?>
</div>