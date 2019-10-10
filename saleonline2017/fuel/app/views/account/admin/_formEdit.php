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
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("User name", 'first_name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('user_name', Input::get_field_value('username', $account, 'first_name'), array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("First name", 'first_name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('first_name', Input::get_field_value('account', $account, 'first_name'), array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Last name", 'last_name', array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('last_name', Input::get_field_value('account', $account, 'last_name'), array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Email", "Email", array('class' => 'control-label required')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('email', '', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Password", 'passwd', array('class' => "control-label required")); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('passwd', Input::get_field_value('passwd', null), array('class' => 'form-control', 'type' => 'password')); ?>
            </div>
        </div>

        <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-2">
                <?php echo Form::label("Password hint", 'pass_hint', array('class' => 'control-label')); ?>
            </div>
            <div class="col-lg-7 col-lg-offset-0">
                <?php echo Form::input('pass_hint', Input::get_field_value('passwd', null), array('class' => 'form-control', 'type' => 'password')); ?>
            </div>
        </div>
    </div>
    <!-- chose role !-->
    <div class="col-lg-3">
        <div class="row"  style="margin-top: 5px;">
            <label>
                * Chosen Roles
            </label>
        </div>

        <?php foreach ($roles as $key => $value): ?>
            <div class="row">
                <label>
                    <?php echo $value["role_name"]; ?>
                </label>
                <div class="col-lg-2">
                    <?php echo Form::checkbox("roles[]", $value["role_name"], array('class' => 'control-label')); ?>
                </div>
            </div>

        <?php endforeach; ?>
        <br>


        <!-- Group
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
        !-->

    </div>
</div>

<div class="row"  style="margin-top: 10px; margin-left: 20px;">
    <hr>
    <div class="form-group">
        <?php echo Form::button('submit', "Submit", array('class' => 'btn btn-default')); ?>
        <?php echo Html::anchor('account/admin', "Back", array('class' => 'btn btn-warning')); ?>
    </div>

</div>
<?php echo Form::close() ?>
