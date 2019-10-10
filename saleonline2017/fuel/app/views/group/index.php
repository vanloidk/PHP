<div class="content-customize">
    <?php echo Form::open(array('role' => 'form')); ?>
    <div class="row header-lbl">
        <h3 class="page-header header_custom" >
            <?php echo "Group"; ?>
        </h3>
        <div >
            <a href="<?php echo Uri::base() . 'group/register'; ?>" class="btn btn-primary pull-right"><?php echo "Register"; ?></a>
        </div>
    </div>

    <table class="table ">
        <thead>
            <tr class="header_tr">
                <th style="width: 10%;"><?php echo "ID"; ?></th>
                <th style="width: 40%;"><?php echo "Name"; ?></th>
                <th style="width: 10%;"><?php echo "Users"; ?></th>
                <th style="width: 10%;"><?php echo "Roles"; ?></th>
                <th><?php echo "Process"; ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($groups as $key => $value): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php ?></td>
                    <td><?php echo $value->user_id; ?></td>
                    <td>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'group/edit/' . $key ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'group/delete/' . $key ?>"  >
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo Form::close() ?>
</div>