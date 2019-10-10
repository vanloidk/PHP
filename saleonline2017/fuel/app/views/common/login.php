<?php echo Form::open(); ?>

<div class="form-group">
    <div class="row">
        <h3 class="page-header" style="margin-top: -10px;">
            <img width="120px" height="100px" src="<?php echo Uri::base() ?>assets/imglogin/login.jpg">
            <?php
            if (Request::active()->controller == 'Controller_Account_User') {

                echo __('login.title_login_user');
            } elseif (Request::active()->controller == 'Controller_Account_Admin') {
                echo __('login.title_login_admin');
            } else {
                echo __('login.title_login_sale');
            }
            ?>
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-offset-1 col-lg-3" >
            <?php echo Form::label(__('login.lbl_user_name'), 'account', array('class' => 'control-label required')); ?>
        </div>
        <div class="col-lg-5">
            <?php echo Form::input('account', Input::post('account', ''), array('class' => 'form-control')); ?>
            <?php echo Form::error('account', $err) ?>
        </div>
    </div>
    <div class="row" style="padding-top: 5px;">
        <div class="col-lg-3 col-lg-offset-1">
            <?php echo Form::label(__('login.lbl_pass'), 'passwd', array('class' => 'control-label required')); ?>
        </div>
        <div class="col-lg-5">
            <?php echo Form::input('passwd', Input::post('passwd', ''), array('class' => 'form-control', 'type' => 'password')); ?>
            <?php echo Form::error('passwd', $err) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-4"style="padding-top: 10px;">
            <?php echo Form::button('submit', __('menu.lbl_login'), array('class' => 'btn btn-default')); ?>
        </div>
    </div>
</div>
<!--<div style="float: right;">
    version 1.0
</div>-->
</div>
<?php echo Form::close(); ?>