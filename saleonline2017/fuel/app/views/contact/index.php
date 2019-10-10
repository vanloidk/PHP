<div class="content-customize">
    <div class="row clearfix">
        <h4>
            Danh sách thành viên liên hệ
        </h4>
        <hr>
    </div>


    <table class="table">
        <thead>
            <tr class="header_tr">
                <th>Name</th>
                <th>Contact date</th>
                <th>Email</th>
                <th>Organization</th>
                <th>Phone</th>
                <th>Reason</th>
                <th>Common</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $key => $value): ?>
                <tr id="tr_<?php echo $value->id; ?>">
                    <td><?php echo $value->name; ?></td>
                    <td><?php if ($value->created_date != null) echo date('Y-m-d', strtotime($value->created_date)); ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->organization; ?></td>
                    <td><?php echo $value->phone; ?></td>
                    <td><?php echo $value->reason; ?></td>
                    <td><?php echo $value->common; ?></td>
                    <td>
                        <a href="<?php echo Fuel\Core\Uri::base() . 'contact/edit/' . $key ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>

                        <a onclick="deleteContact(<?php echo $value->id ?>);">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
<script>

    function  deleteContact(contactId)
    {
        $.ajax({
            url: base_url + "contact/delete/",
            type: "POST",
            data: {contactId: contactId},
            async: false,
            success: function () {
                $("#tr_" + contactId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>