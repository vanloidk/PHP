
<div class="payments">
    <div class="dTitle" >
        <img  src="<?php echo Uri::base() . "assets/imgpayment/payment-method.png" ?>" style="width: 20px; height: 20px;"/>
        <h1 class="htop">ĐỊA CHỈ NHẬN HÀNG</h1>
    </div>
    <form action="makepayment" method="POST" >
        <!-- form edit !-->
        <?php require_once '_formaddress.php'; ?>

        <div class="tblPayment">
            <div>
                <img src="<?php echo Uri::base() . "assets/imgpayment/payment-method.png" ?>" style="width: 20px; height: 20px;"/>
                <span style="color: #eb9316;">CHỌN PHƯƠNG THỨC THANH TOÁN</span>
            </div>
            <div>
                <table border="1">
                    <tr>
                        <td style="padding-left: 5px;">
                            <input type="radio"  name="paymentoptions[]" value="1"  checked="true" />
                            <img src="<?php echo Uri::base() . "assets/imgpayment/credit_cart.png"; ?>" />

                        </td>
                        <td style="padding-left: 5px;">
                            <span> Thanh toán bằng ATM hoặc chuyển thể</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 5px;">
                            <input type="radio"  name="paymentoptions[]" value="2"  checked="true" />
                            <img src="<?php echo Uri::base() . "assets/imgpayment/money_icon.png"; ?>" />
                        </td>
                        <td style="padding-left: 5px;">
                            <span>Thanh toán tại VP công ty</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 5px;">
                            <input type="radio"  name="paymentoptions[]" value="3"  checked="true" />
                            <img src="<?php echo Uri::base() . "assets/imgpayment/money_icon.png"; ?>" />
                        </td>
                        <td style="padding-left: 5px;">
                            <span> Giao hàng thu tiền tận nơi</span>
                        </td>
                    </tr>

                </table>
            </div>

        </div>

        <div class="row" style="padding-left: 48%;">
            <div class="col-lg-2">
                <a href="<?php echo Uri::base() . "product/"; ?>" class="btn btn-info" >Tiếp tục mua hàng </a>
            </div>
            <div class="col-lg-2" style="padding-left: 14%;">
                <button type="submit" class="btn btn-info" >Thanh toán</button>
            </div>
        </div>

    </form>
</div>




