<div class="content-customize">
    <div class="row">
        <div>
            <h4>
                Roles
            </h4>
        </div>
        <hr>
        <div style="margin-top: -10px; margin-bottom:60px;">

            <a href="<?php echo Uri::base() . 'role/new' ?>" class="btn btn-primary" style="float: right;">
                Add
            </a>
        </div>

    </div>

    <table class="table">
        <thead>
            <tr class="header_tr">
                <th>ID</th>
                <th>Name</th>
                <th>Filter</th>
                <th>User</th>
<!--                <th>"Group"</th>-->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $key => $value): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->filter; ?></td>
                    <td><?php echo $value->user_id; ?></td>
    <!--                    <td></td>-->
                    <td>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'role/edit/' . $key ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'role/delete/' . $key ?>">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
