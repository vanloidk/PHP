<div class="content-customize02" style="padding-top: 15px;">
    <?php echo Form::open(array('role' => 'form', 'class' => 'form-horizontal')); ?>
    <div class="container">
        <div class="row">
            <div class="row"  style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("User name", 'name', array('class' => 'control-label required')); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('user_name', $contact->name, array('class' => 'form-control', 'readonly')); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Email", "Email", array('class' => 'control-label required')); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('email', $contact->email, array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Organization", 'organization', array('class' => "control-label")); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('organization', $contact->organization, array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="row"  style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Mobile", 'Mobile', array('class' => 'control-label')); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('mobile', $contact->phone, array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="row"  style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Reason", 'reason', array('class' => 'control-label')); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('reason', $contact->reason, array('class' => 'form-control')); ?>
                </div>
            </div>

            <div class="row"  style="margin-top: 5px;">
                <div class="col-lg-2">
                    <?php echo Form::label("Common", 'common', array('class' => 'control-label')); ?>
                </div>
                <div class="col-lg-7 col-lg-offset-0">
                    <?php echo Form::input('common', $contact->common, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="row"  style="margin-top: 10px; margin-left: 17.5%;">

            <div class="form-group">
                <?php echo Form::button('submit', "Lưu", array('class' => 'btn btn-default')); ?>
                <?php echo Html::anchor('contact/list', "Quay lại", array('class' => 'btn btn-warning')); ?>
            </div>

        </div>
        <?php echo Form::close() ?>
    </div>
</div>