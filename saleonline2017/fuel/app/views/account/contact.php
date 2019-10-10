<div class="content-customize02">
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="row">
        <div  class="col-md-12">
            <img src="<?php echo Uri::base() . "assets/imginfo/contact.jpeg" ?>" style="width: 40px; height: 40px;"/>
            <h3 style="display: inline-block;"> Liên hệ với chúng tôi</h3>

            <hr>
            <span>
                Liên Hệ: Đẹp độc lạ shop - Company<br>
                Địa Chỉ: Etown 1, 4 floor, 364 Cong Hoa, P.14, Q.TanBinh HCM City <br>
                SĐT: 096 946 3379<br>
                Fax :   083 763 5558<br>
            </span>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Họ Tên:", 'username', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('username', "", array('class' => 'form-control')); ?>
                <?php echo Form::error('username', $err); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Email:", 'email', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('email', "", array('class' => 'form-control')); ?>
                <?php echo Form::error('email', $err); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Cơ quan:", 'Organization', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('oganization', "", array('class' => 'form-control')); ?>
                <?php echo Form::error('oganization', $err); ?>
            </div>

        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("SĐT:", 'mobile', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('mobile', "", array('class' => 'form-control')); ?>
                <?php echo Form::error('mobile', $err); ?>
            </div>
        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Lý do:", 'reason', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('reason', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Chúng tôi có thể giúp gì cho bạn?", 'help', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('help', "", array('class' => 'form-control')); ?>
            </div>
        </div>


        <div class="row"  style="margin-top: 10px; margin-left: 80%;">
            <div class="form-group">
                <?php echo Form::button('Gửi', __('common.'), array('class' => 'btn btn-default')); ?>
                <?php echo Html::anchor('product/', "Quay lại", array('class' => 'btn btn-warning')); ?>
            </div>

        </div>
        <?php echo Form::close() ?>
    </div>
</div>