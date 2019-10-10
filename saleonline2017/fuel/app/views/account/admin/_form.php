<?php
$action = Request::active()->action;
if (!isset($account)) {
    $account = null;
}
if (!isset($roles)) {
    $roles = null;
}
if (!isset($groups)) {
    $groups = null;
}
?>

<?php echo Form::open(array('role' => 'form', 'class' => 'form-horizontal account_form_' . $action)); ?>
<div class="container">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-2">
                <?php echo Form::label("Email", "Email", array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('account', Input::get_field_value('account', $account, 'email'), array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Password", 'passwd', array('class' => "control-label")); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('passwd', Input::get_field_value('passwd', null), array('class' => 'form-control', 'type' => 'password')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Password Hint", 'pass_hint', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('passwd', Input::get_field_value('passwd', null), array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("First Name", 'first_name', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('first_name', Input::get_field_value('account', $account, 'first_name'), array('class' => 'form-control')); ?>
            </div>

        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Last Name", 'last_name', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('last_name', Input::get_field_value('account', $account, 'last_name'), array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Date of Birth", 'Date_of_birth', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('created_at', Input::get_field_value('account', $account, 'created_at'), array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Contact Number", 'contact_number', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('created_at', Input::get_field_value('account', $account, 'created_at'), array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="row"  style="margin-top: 5px;">
            <label>
                * Chosen Roles
            </label>
        </div>

        <?php foreach ($roles as $key => $value): ?>
                <div class="row">
                    <label>
                        <?php echo $value->name ?>
                    </label>
                    <div class="col-lg-2">
                        <?php echo Form::checkbox("name", $value->name, array('class' => 'control-label')); ?>
                    </div>
                </div>

            <?php endforeach; ?>
        <br>
        <div class="row">
            <label>
                * Chosen Group
            </label>
        </div>

        <?php foreach ($groups as $key => $value): ?>
                <div class="row">
                    <label>
                        <?php echo $value->name ?>
                    </label>
                    <div class="col-lg-2">
                        <?php echo Form::checkbox("name", $value->name, array('class' => 'control-label')); ?>
                    </div>
                </div>
            <?php endforeach; ?>

    </div>
</div>

<div class="row"  style="margin-top: 10px; margin-left: 20px;">
    <hr>
    <div class="form-group">
        <?php echo Form::button('submit', __('common.'), array('class' => 'btn btn-default')); ?>
        <?php echo Html::anchor('account/admin', "back", array('class' => 'btn btn-warning')); ?>
    </div>

</div>
<?php echo Form::close() ?>
