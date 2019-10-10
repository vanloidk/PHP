<div class="content-customize02">
    <div class="row">
        <div class="col-md-2">
            <label>Product:</label>
        </div>
        <div  class="col-md-3">
            <?php echo Form::input('oder_id', "", array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-1">
            <?php require_once "popupaddshipdtl.php"; ?>
        </div>
        <form action="saveShip" method="post">
            <div class="col-md-1">
                <button type="submit"  id="btnAbsentModel" value= "save" class="btn btn-primary">save</button>
            </div>
        </form>
    </div>
    <!-- import file !-->
    <div class="form-group upload-ship">
        <div class="row" style="padding-bottom: 5px;">
            <div class="col-md-2">
                <input class="btn btn-default" type="file" value="Chosen file"  id = "btnshipimport"  name ="Import"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <form method="post" enctype="multipart/form-data">
                    <input class="btn btn-primary" type="submit" value="Upload"/>
                </form>
            </div>
        </div>
    </div>
    <hr>

    <table class="table " >
        <thead>
            <tr class="header_tr">
                <th style="width: 10%"><?php echo "order Id"; ?></th>
                <th  style="width: 40%"><?php echo "Name"; ?></th>
                <!--<th><?php echo "Inventory(ton kho)"; ?></th>
                <th><?php echo "Inventory(CN nhan)"; ?></th>-->
                <th  style="width: 15%"><?php echo "Price"; ?></th>
                <th  style="width: 15%"><?php echo "Quanity"; ?></th>
                <th>Process</th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($shipdtls as $value):
                ?>
                <tr id="tr_<?php echo $value->id ?>">
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->product_name ?></td>
               <!-- <td><?php echo $value->inventory ?></td>
                    <td><?php echo $value->inventory ?></td>-->
                    <td><?php echo $value->price ?></td>
                    <td><?php echo $value->quantity ?></td>
                    <td>
                        <a type="submit" onclick="deleteShipDtl(<?php echo $value->id ?>);">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function  deleteShipDtl(shipId)
    {
        $.ajax({
            url: base_url + "sale/shipDtl/delete/",
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
