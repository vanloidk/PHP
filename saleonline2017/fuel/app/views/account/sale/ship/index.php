<div class="content-customize">
    <div class="row">
        <div class="pull-right">
            <a href="<?php echo Uri::base() . 'sale/shipdtl/' ?>" class="btn btn-default" >
                ship order
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
                <th><?php echo "Ship order"; ?></th>
                <th><?php echo "Name"; ?></th>
                <th><?php echo "From position"; ?></th>
                <th><?php echo "To position"; ?></th>
                <th><?php echo "Ship date"; ?></th>
                <th><?php echo "Price"; ?></th>
                <th><?php echo "Status"; ?></th>
                <th colspan="2"><?php echo "Process"; ?></th>

            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($ships as $value) :
                ?>
                <tr id ="tr_<?php echo $value->id ?>">
                    <td> <?php echo $value->id ?></td>
                    <td><?php echo $value->name ?></td>
                    <td><?php echo $value->from_company ?></td>
                    <td><?php echo $value->to_company ?></td>
                    <td><?php echo $value->ship_date ?></td>
                    <td><?php echo $value->total_price ?></td>
                    <td><?php echo $value->status ?></td>
                    <td>  
                        <a href="<?php echo Uri::base() . 'sale/ship/shipDetail/?id=' . $value->id ?>" >
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </a>
                        <a type="submit"  onclick="deleteShip('<?php echo $value->id ?>');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function  deleteShip(shipId)
    {
        $.ajax({
            url: base_url + "sale/ship/delete/",
            type: "POST",
            data: {shipId: shipId},
            async: false,
            success: function () {
                $("#tr_" + shipId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>