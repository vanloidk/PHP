<div class="content-customize">
    <div>
        <h4>
            Users
        </h4>
    </div>

    <hr>
    <div class="row">

        <div class="col-md-1">
            <label>Group:</label>
        </div>
        <div class="col-md-1">
            <?php echo Form::select('group', 'all', $groups, array('class' => 'form-control', 'style' => 'width: 200px', 'id' => 'group_selected')); ?>
        </div>
        <div>
            <a href="<?php echo Fuel\Core\Uri::base() . 'account/admin/new' ?>" class="btn btn-primary pull-right" >
                Add
            </a>
        </div>
    </div>
    <br>

    <table class="table ">
        <thead>
            <tr class="header_tr">
                <th>ID</th>
                <th>UserName</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Roles</th>
            <!--<th>Groups</th>-->
                <th>Lock</th>
                <th>Process</th>
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>
            <?php foreach ($lstaccount as $key => $value): ?>
                <tr id="tr_<?php echo $value->id; ?>">
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value->username; ?></td>
                    <td><?php echo $value->first_name; ?></td>
                    <td><?php echo $value->last_name; ?></td>
                    <td><?php ?></td>
                    <!-- <td></td>-->
                    <td><?php echo $value->lock; ?></td>
                    <td> 
                        <a href="<?php echo Fuel\Core\Uri::base() . 'account/admin/edit/' . $key ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a  onclick="deleteAccount(<?php echo $value->id ?>);">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>

    function  deleteAccount(userId)
    {
        $.ajax({
            url: base_url + "account/admin/delete/",
            type: "POST",
            data: {userId: userId},
            async: false,
            success: function () {
                $("#tr_" + userId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>
