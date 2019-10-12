<div class="content-customize02">
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="row" >
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
    <div class="clear" style="clear: both;">
    </div>
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
                <?php echo Form::label("SĐT:", 'mobile', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('mobile', "", array('class' => 'form-control')); ?>
                <?php echo Form::error('mobile', $err); ?>
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
                <?php echo Form::label("Chúng tôi có thể giúp gì cho bạn?", 'help', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::input('help', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Nội dung:", 'content', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-5 col-lg-offset-0">
                <?php echo Form::textarea('content', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px; padding-left: 50%;">
            <div class="form-group">
                <?php echo Form::button('Gửi', __('common.'), array('class' => 'btn btn-default')); ?>
                <?php echo Html::anchor('sanpham/', "Quay lại", array('class' => 'btn btn-warning')); ?>
            </div>

        </div>
        <?php echo Form::close() ?>
    </div>
    <hr style="border-width:2px;">
    <div>
        <div class="iframe-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.559085765042!2d106.63989141206584!3d10.802260372946188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175294f46ce189d%3A0x875b87cf82f8476d!2zMzY0IEPhu5luZyBIw7JhLCBwaMaw4budbmcgMTMsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2sin!4v1507430573382" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

</div>