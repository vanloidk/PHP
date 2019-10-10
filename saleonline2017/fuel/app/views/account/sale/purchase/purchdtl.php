<div class="content-customize02">

    <div class="row">
        <div class="col-md-2">
            <label>product:</label>
        </div>
        <div  class="col-md-3">
            <?php echo Form::input('oder_id', "", array('class' => 'form-control')); ?>
        </div>
        <div class="col-md-1">
            <?php require_once "popupaddpurchdtl.php"; ?>
        </div>
        <form action="savePurch" method="post">
            <div class="col-md-1">
                <button type="submit"  id="btnAbsentModel" value= "save" class="btn btn-primary">save</button>
            </div>
        </form>
    </div>


    <div class="form-group upload-purch">
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
                <th><?php echo "Order product"; ?></th>
                <th><?php echo "Name product"; ?></th>
                <th><?php echo "Price"; ?></th>
                <th><?php echo "Quantity"; ?></th>
                <th><?php echo "Process"; ?></th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($purchdtls as $value): ?>
                <tr id ="tr_<?php echo $value->id ?>">
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->product_name; ?></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->quantity; ?></td>
                    <td>
                        <a type="submit" onclick="deletePurchDtl(<?php echo $value->id ?>);">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>

    function  deletePurchDtl(purchId)
    {
        $.ajax({
            url: base_url + "sale/purchDtl/delete/",
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
