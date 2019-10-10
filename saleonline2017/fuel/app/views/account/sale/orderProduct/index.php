<div class="content-customize">
    <form action="search" method="post">
        <div class="row row_cus">
            <div class="col-lg-2">
                <label>Order ID:</label>
            </div>
            <div  class="col-lg-offset-2">
                <?php echo Form::input('oder_id', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-2">
                <label>Customer:</label>
            </div>
            <div class="col-lg-offset-2">
                <?php echo Form::input('customer', "", array('class' => 'form-control')); ?>
            </div>

        </div>

        <div class="row row_cus">
            <button type="submit" value="submit" class="btn btn-default pull-right" >Search</button>
        </div>
        <hr>
    </form>

    <div class="header-lbl">
        <a href="<?php echo Uri::base() . 'account/admin/new' ?>" class="btn btn-primary pull-right" >
            Add
        </a>
    </div>

    <br>

    <table class="table " >
        <thead>
            <tr class="header_tr">
                <th><?php echo "Order ID"; ?></th>
                <th><?php echo "Order name"; ?></th>
                <th><?php echo "Customer name"; ?></th>
                <th><?php echo "Price"; ?></th>
                <th><?php echo "Status"; ?></th>
                <th><?php echo "Process"; ?></th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($orders as $key => $value) : ?>
                <tr id = tr_<?php echo $value->id; ?>>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->account_id ?></td>
                    <td><?php echo $value->total; ?></td>
                    <td >
                        <?php if ($value->status == 1) { ?>
                            <img alt="50x50" src= <?php echo Uri::base() ?>assets/img/ok.png class = "tr_<?php echo $value->id ?>_tdigm">
                        <?php } else { ?>
                            <img alt="50x50" src= <?php echo Uri::base() ?>assets/img/no.png class = "tr_<?php echo $value->id ?>_tdigm">
                        <?php } ?>
                    </td>

                    <td><?php ?>
                        <button <?php echo $value->status == 1 ? 'disabled' : "" ?> type="button" id="btnApproval_<?php echo $value->id ?>" value="submit" class="btn  btn-primary" onclick="approveOrder(<?php echo $value->id; ?>, <?php echo $value->status; ?>);" >
                            <?php
                            if ($value->status == 1) {
                                echo "Approved";
                            } else {
                                echo "Approval";
                            }
                            ?>
                        </button>
                        <button type="submit" class="btn btn-primary"  onclick="deleteOrder(<?php echo $value->id ?>);">Delete</button>

                                                                                                                                            <!--<button type="submit" class="btn btn-primary"  onclick="location.href = '<?php echo Uri::base() . 'sale/order/orderDelete/?id=' . $value->id ?>'">Delete</button>-->
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>
<script>
    function  approveOrder(orderId, status)
    {
        $.ajax({
            url: base_url + "sale/order/approveOrder/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {
                if (status === 0)
                {
                    $(".tr_" + orderId + "_tdigm").removeAttr("src");
                    $(".tr_" + orderId + "_tdigm").attr('src', "<?php echo Uri::base() ?>assets/img/ok.png");
                    $("#btnApproval_" + orderId).text("Approved");
                    $("#btnApproval_" + orderId).attr('disabled', true);
                }
            },
            error: function () {
                alert("failed");
            }
        });
    }

    function  deleteOrder(orderId)
    {
        $.ajax({
            url: base_url + "sale/order/deleteOrder/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {
                $("#tr_" + orderId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }

</script>
