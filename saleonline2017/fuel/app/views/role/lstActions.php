<div class="content-customize02">
    <div class="row">
        <div>
            <h4>
                List Actions...
            </h4>
        </div>
        <hr>

        <div>
            <a href="<?php echo Fuel\Core\Uri::base() . 'account/admin/new' ?>" class="btn btn-primary" style="float: right;">
                Add Actions
            </a>
        </div>
    </div>

    <table class="table">
        <thead >

        <th style="width: 10px;"><?php echo "ID"; ?></th>
        <th style="width: 10px;"><?php echo "Controller"; ?></th>
        <th style="width: 10px;"><?php echo "Permisstion"; ?></th>
        <th style="width: 10px;"><?php echo "Description"; ?></th>
        <th style="width: 1%;"><?php echo "Action"; ?></th>
        <th style="width: 200px;"><?php echo "User Id"; ?></th>
        <th style="width: 10px;"><?php echo "Process"; ?></th>

        </thead>
        <tbody>

            <?php foreach ($role_permistions as $key => $value): ?>
                <tr>
                    <td  style="width: 10px;"><?php echo $key; ?></td>
                    <td  style="width: 10px;"><?php echo $value->area; ?></td>
                    <td  style="width: 10px;"><?php echo $value->permission; ?></td>
                    <td  style="width: 10px;"><?php echo $value->description; ?></td>

                    <td  style="width: 1%;"><?php echo $value->actions; ?></td>
                    <td  style="width: 10px;"><?php echo $value->user_id; ?></td>
                    <td  style="width: 10px;">
                        <a href="<?php echo Fuel\Core\Uri::base() . 'role/edit/' . $key ?>" class="btn btn-primary">
                            edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <br>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <hr>
            <p>
                Footer information company
            </p>
        </div>
    </div>
</div>
