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
                    <td >
                        <p style="color: red;"> Đã hủy</p>
                    </td>

                    <td>
                        <button  type="button" id="btnCancel_<?php echo $value->id ?>" value="submit" class="btn  btn-primary" onclick="recoveryOrder(<?php echo $value->id; ?>);" >
                            Phục hồi
                        </button>
                    </td>

                    <td >
                        <a href="<?php echo Uri::base() . 'sale/orderCancel/detail/' . $value->id; ?>" class="btn btn-primary" >
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
    function  recoveryOrder(orderId)
    {
        $.ajax({
            url: base_url + "sale/orderCancel/recoveryOrder/",
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
