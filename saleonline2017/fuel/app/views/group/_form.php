<div class="col-lg-offset-8">
    <div >
        <label>
            * Chosen Roles
        </label>
    </div>

    <?php foreach ($roles as $key => $value): ?>
        <div >
            <label>
                <?php echo $value->name ?>
            </label>
            <div class="col-lg-2">
                <?php echo Form::checkbox("name", $value->name, array('class' => 'control-label')); ?>
            </div>
        </div>

    <?php endforeach; ?>
    <br>

</div>