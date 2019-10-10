<div class="content-customize" style="padding-top: 15px;">
    <form action="search" method="post">
        <div class="row ">
            <div class="col-lg-2">
                <label>Mã đơn hàng:</label>
            </div>
            <div  class="col-lg-5">
                <?php echo Form::input('oder_id', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row" style="padding-top: 4px;">
            <div class="col-lg-2">
                <label>Tên khách hàng:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('customer', "", array('class' => 'form-control')); ?>
            </div>

        </div>

        <div class="row" style="padding-left: 50.5%; padding-top: 4px;">
            <button type="submit" value="submit" class="btn btn-default" >Tìm kiếm</button>
        </div>
        <hr>
    </form>
    <br>

    <table class="table " >
        <thead>
            <tr class="header_tr">
                <th><?php echo "Mã đơn hàng"; ?></th>
                <th><?php echo "Tên đơn hàng"; ?></th>
                <th><?php echo "Tên khách hàng"; ?></th>

                <th><?php echo "Số lượng"; ?></th>

                <th><?php echo "Tổng tiền"; ?></th>
                <th><?php echo "Trạng thái"; ?></th>
                <th colspan="4"><?php echo "Process"; ?></th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($orders as $key => $value) : ?>
                <tr id = tr_<?php echo $value->id; ?>>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php if (!empty($account)) echo $account->username; ?></td>
                    <td><?php echo $value->quantity; ?></td>

                    <td><?php echo $value->total; ?></td>
                    <td id="status_payment_<?php echo $value->id; ?>" style="color: red;">
                        <span>
                            Chờ thanh toán
                        </span>
                    </td>
                    <td style="width: 50px;">
                        <button <?php echo $value->status == 4 ? 'disabled' : "" ?> type="button" id="btnApproval_<?php echo $value->id ?>" value="submit" class="btn  btn-primary" onclick="paymentOrder(<?php echo $value->id; ?>);" >
                            <?php
                            if ($value->status == 4) {
                                echo "Đã xác nhận";
                            } else {
                                echo "Xác nhận";
                            }
                            ?>
                        </button>
                    </td>
                    <td>
                        <button type="button" id="btnCancel_<?php echo $value->id ?>" value="submit" class="btn  btn-primary" onclick="orderCancel(<?php echo $value->id; ?>);" >
                            Hủy Order
                        </button>
                    </td>
                    <td >
                        <a href="<?php echo Uri::base() . 'sale/orderpayment/detail/' . $value->id; ?>" class="btn btn-primary" >
                            Chi tiết
                        </a>
                    </td>
                    <td>
                        <a onclick="deleteOrder(<?php echo $value->id ?>);">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>
</div>
<script>
    function  paymentOrder(orderId)
    {
        $.ajax({
            url: base_url + "sale/orderpayment/paymentOrder/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {
//                $("#status_payment_" + orderId).text("Đã thanh toán");
//                $("#btnApproval_" + orderId).text("Đã xác nhận");
//                $("#btnApproval_" + orderId).attr('disabled', true);
//                $("#btnCancel_" + orderId).removeAttr('disabled');
                $("#tr_" + orderId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }

    function orderCancel(orderId)
    {
        $.ajax({
            url: base_url + "sale/orderpayment/orderCancel/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {
//                $("#status_payment_" + orderId).text("Chưa thanh toán");
//                $("#btnApproval_" + orderId).text("Xác nhận");
//                $("#btnCancel_" + orderId).attr('disabled', true);
//                $("#btnApproval_" + orderId).removeAttr('disabled');
                $("#tr_" + orderId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }

    function  deleteOrder(orderId)
    {
        $.ajax({
            url: base_url + "sale/orderpayment/deleteOrder/",
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
