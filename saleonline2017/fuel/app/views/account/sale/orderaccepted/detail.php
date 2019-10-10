<?php
if ($orders->order_type == 1) {
    $typeOrder = "Thanh toán bằng ATM hoặc chuyển thể";
} elseif ($orders->order_type == 2) {
    $typeOrder = "Thanh toán tại VP công ty";
} else {
    $typeOrder = "Giao hàng thu tiền tận nơi";
}
?>
<div class="content-customize" style="padding-top: 15px;">
    <form action="search" method="post">
        <div class="row" >
            <div class="col-lg-2">
                <label>Mã đơn hàng:</label>
            </div>
            <div  class="col-lg-5">
                <?php echo Form::input('oderId', $orders->id, array('class' => 'form-control', 'readonly')); ?>
            </div>
        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Tên đơn hàng:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('orderName', $orders->name, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Tên khách hàng:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('customerName', $orders->name, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Email:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('email', $delivery->email, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>

        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Đia chỉ:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('address', $delivery->address_1, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Tỉnh/Thành phố</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('city', $delivery->city, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Điện thoại:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('phone', $delivery->phone, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Ngày tạo:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('created_date', date('Y-m-d', strtotime($orders->created_date)), array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Loại thanh toán:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('order_type', $typeOrder, array('class' => 'form-control', 'readonly')); ?>
            </div>

        </div>
        <div class="row" style="padding-top: 2px;">
            <div class="col-lg-2">
                <label>Lời nhắn:</label>
            </div>
            <div class="col-lg-5">
                <?php echo Form::input('comment', $orders->comment, array('class' => 'form-control', 'readonly')); ?>
            </div>

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
                <th><?php echo "Sản phẩm"; ?></th>
                <th><?php echo "Số lượng"; ?></th>
                <th><?php echo "Giá tiền"; ?></th>
                <th><?php echo "Tổng tiền"; ?></th>
                <th><?php echo "Thuế"; ?></th>
            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($orders->order_dtl as $key => $value) : ?>
                <tr id = tr_<?php echo $value->id; ?>>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $orders->name; ?></td>
                    <td><?php if (!empty($account)) echo $account->username; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->quantity; ?></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->total; ?></td>
                    <td><?php echo $value->tax; ?></td>
                </tr>
            <?php endforeach;
            ?>
        </tbody>
    </table>

    <div class="row" style="padding-top: 2px;">
        <div class="col-lg-2" style="background: #DAD9D9; height: 50px;">
            <label style="padding-top: 15px;">Ghi chú:</label>
        </div>
        <?php
        if ($orders->status == 1) {
            $status = "disabled";
        } else {
            $status = "";
        }
        ?>
        <div class="col-lg-10">
            <?php echo Form::textarea('note', $orders->sale_note, array('class' => 'form-control', $status)); ?>
        </div>
    </div>
    <div class="row navbar-right" style="padding-top: 15px; padding-right: 20px;">
        <?php echo Html::anchor('sale/orderaccepted/', "Quay lại", array('class' => 'btn btn-warning')); ?>
        <input type="submit" class="btn btn-primary " value="Hủy" onclick="orderCancel(<?php echo $orders->id; ?>);"/>
        <input type="submit" id="btnAccepted_<?php echo $orders->id; ?>" onclick="approveOrder(<?php echo $orders->id; ?>);" class="btn btn-primary " value="Xác nhận" <?php if ($orders->status == 1) echo "disabled"; ?>/>
    </div>
</div>
<script>
    function  approveOrder(orderId)
    {
        $.ajax({
            url: base_url + "sale/order/approveOrder/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {

                $("#btnAccepted_" + orderId).attr('disabled', true);

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

    function orderCancel(orderId)
    {
        $.ajax({
            url: base_url + "sale/order/orderCancel/",
            type: "POST",
            data: {orderId: orderId},
            async: false,
            success: function () {
                $("#btnAccepted_" + orderId).removeAttr('disabled');
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>
