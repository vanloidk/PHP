<div class="content-customize02">
    <div class="row clearfix">
        <h3 class="page-header">
            Giỏ hàng
        </h3>
    </div>

    <form action="" method="POST" id="delivery">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;"><?php echo "Tên SP"; ?></th>
                    <th style="width: 20%;"><?php echo "Giá"; ?></th>
                    <th style="width: 20%;"><?php echo "Số lượng"; ?></th>
                    <th style="width: 20%;"><?php echo "Tổng"; ?></th>
                    <th style="width: 10%;"><?php echo "Xóa"; ?></th>
                </tr>
            </thead>

            <tbody id="bd_cart" value = "<?php echo count($carts); ?>">
                <!-- input number products -->
            <input value="<?php echo count($carts); ?>" name="numProducts" style="display: none;">

            <?php
            $sum_cart = 0;
            if ($carts):
                foreach ($carts as $key => $value):
                    $sum_cart += $value["total_qty"];
                    ?>
                    <tr style="display: none;">
                        <td><input value="<?php echo $value["product_id"]; ?>" name="product_id[]"> </td>
                    </tr>

                    <tr id="<?php echo 'tr_' . $key; ?>">
                        <?php ?>
                        <td> <input type="text" name="nameP[]" id='nameP_<?php echo $key; ?>' value="<?php echo $value["product_name"]; ?>" style="border:0px;" readonly></td>
                        <td><input type="text" id='price_<?php echo $key; ?>' name="price[]" value="<?php echo $value["total_price"]; ?>" style="border:0px;" readonly></td>
                        <td ><input type="number" id='item_<?php echo $key; ?>' style="width: 50px;" name="ttl_items[]" value="<?php echo $value["total_items"]; ?>"> </td>
                        <td><input type="text" name="qty[]" id='qty_<?php echo $key; ?>' value="<?php echo $value["total_qty"]; ?>" style="border:0px;" readonly></td>
                        <td>
                            <a type="submit" onclick="deleteCart('<?php echo $value["product_id"]; ?>');">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tbody>

        </table>


        <div class="row" style="background-color: #b2dba1;">
            <div>
                <table class="col-lg-offset-8" >
                    <tr>
                        <td  class="col-lg-5 col-lg-offset-9">
                            <p style="padding-top: 20px; font-weight: bold;">
                                Tổng:
                            </p>
                        </td>
                        <td>
                            <p style="padding-top: 20px;">
                                <input value="<?php echo $sum_cart . " VND"; ?>" name ="ttl_cart" id='ttlProduct' style="border: none; color: red; background: #b2dba1; " readonly>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class="col-lg-offset-10">
                <input type="submit" value="Tiếp tục" class="btn btn-primary" onclick="paymentChekout();">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

    function paymentChekout()
    {
        var account = <?php echo($accountId); ?>;
        if (account != -1)
        {
            $('#delivery').attr('action', '../../delivery/checkout01');

        } else {
            $('#delivery').attr('action', '../../delivery/');
        }
    }

    function  deleteCart(cartId)
    {
        $.ajax({
            url: base_url + "cart/delete/",
            type: "POST",
            data: {cartId: cartId},
            async: false,
            success: function () {
                //$("#tr_" + cartId).remove();
                window.location.reload();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>
