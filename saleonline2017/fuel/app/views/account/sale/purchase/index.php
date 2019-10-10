<div class="content-customize">
    <div class="row">
        <div class="pull-right">
            <a href="<?php echo Uri::base() . 'sale/purchdtl/' ?>" class="btn btn-default" >
                purch order
            </a>
            <a href="#" class="btn btn-default " >
                export file
            </a>
        </div>
    </div>
    <hr>
    <table class="table " >
        <thead>
            <tr class="header_tr">
                <th style="width: 15%;"><?php echo "Purch order"; ?></th>
                <th style="width: 40%;"><?php echo "name"; ?></th>
                <th style="width: 20%;"><?php echo "Date"; ?></th>
                <th style="width: 10%;"><?php echo "Total"; ?></th>
                <th style="width: 8%;"><?php echo "Status"; ?></th>
                <th><?php echo "Process"; ?></th>
                <th></th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($purchs as $value): ?>
                <tr id = "tr_<?php echo $value->id ?>">
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->purch_date; ?></td>
                    <td><?php echo $value->total_price; ?></td>
                    <td><?php echo $value->status; ?></td>
                    <td>
                        <a href="<?php echo Uri::base() . 'sale/purch/purchDetail/?id=' . $value->id ?>">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </a>
                        <a type="submit" onclick="deletePurch('<?php echo $value->id ?>');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function  deletePurch(purchId)
    {

        $.ajax({
            url: base_url + "sale/purch/delete/",
            type: "POST",
            data: {purchId: purchId},
            async: false,
            success: function () {
                $("#tr_" + purchId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>
