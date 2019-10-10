<div class="content-customize">
    <div>
        <h4>
            Actions of Role...
        </h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-1">
            <label>User:</label>
        </div>
        <div class="col-md-1">

            <?php echo Form::select('name', 'all', $roles, array('class' => 'form-control', 'style' => 'width: 200px', 'id' => 'user_selected')); ?>
        </div>
        <br>
        <hr>

        <div style="margin-bottom: 50px;">
            <a href="<?php echo Uri::base() . 'actions/register' ?>" class="btn btn-primary" style="float: right;">
                Add
            </a>
        </div>
        <div  class="header-lbl" />
    </div>

    <table class="table">
        <thead>
            <tr class="header_tr">
                <th><?php echo "ID"; ?></th>
                <th><?php echo "Area"; ?></th>
                <th><?php echo "Permission"; ?></th>
                <th><?php echo "Description"; ?></th>
                <th><?php echo "Actions"; ?></th>
                <th><?php echo "Users"; ?></th>
                <th><?php echo "Roles"; ?></th>
                <th colspan="2"><?php echo "Action"; ?></th>

            </tr>
        </thead>
        <tbody id ="tbl_actions">
            <?php foreach ($permissions as $key => $value): ?>

                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value->area; ?></td>
                    <td><?php echo $value->permission; ?></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo implode(",", $value->actions); ?></td>
                    <td><?php echo $value->user_id; ?></td>
                    <td><?php ?></td>
                    <td>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'actions/edit/' . $key ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'actions/delete/' . $key ?>">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
</div>