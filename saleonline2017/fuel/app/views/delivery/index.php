<div class="content-customize">
    <div class="container">
        <form action="" method="POST">
            <div class="customer_account">
                <p>
                    Dành cho thành viên của shops
                </p>

                <div class="row" style="padding-bottom: 4px;">
                    <div class="form-group">

                        <div class="col-md-4">
                            <label class="required">
                                User name:
                            </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="account" class="form-control">

                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="required">
                            Password:
                        </label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="passwd">

                    </div>

                </div>
                <div class="row" style="margin-left: 32%;">
                    <div class="col-md-2">
                        <a href="<?php echo Uri::base() ?>account/user/register/" class="btn btn-primary" style="margin-top: 20px;"> Đăng ký</a>
                    </div>
                    <div class="col-md-2 col-lg-offset-1">
                        <input type="submit"  class="btn btn-primary" value="Đăng nhập" style="margin-top: 20px;">
                        <input type="text" name="delivery_login" value="delivery_login" style="margin-top: 20px; display: none;" >
                    </div>
                </div>
            </div>

            <div class="customer_new">
                <p style="padding-bottom: 20px;">
                    Dành cho khách hàng
                </p>
                <a  class="btn btn-info" href="<?php echo Uri::base() ?>delivery/checkout"  style="margin-top: 70px; margin-left: 18%;">
                    Mua ngay
                </a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
</script>
