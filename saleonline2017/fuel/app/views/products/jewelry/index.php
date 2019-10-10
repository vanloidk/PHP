<!--#F1649D-->

<div class="content-customize">
    <div class="row clearfix">
        <h4>
            Trang chủ
        </h4>
        <hr>
    </div>

    <!--danh muc bong tai !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    BÔNG TAI
                    <a href="<?php echo Uri::base() ?>products/earring/">Xem tất cả>></a>
                </h2>
            </div>


            <?php foreach ($earrings as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img alt="800:  Size 3m - 24m. 1 ri 15 trộn sz và mầu theo tỷ lệ hàng về - From to, Chất đẹp" style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img; ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
    <!--danh muc nhan !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    NHẪN
                    <a href="<?php echo Uri::base() ?>products/ring/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($rings as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <!--danh muc day chuyen co !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    DÂY CHUYỀN CỔ
                    <a href="<?php echo Uri::base() ?>products/necklace/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($necklaces as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <!--danh muc lac tay, lac chan !-->
    <div class="row clearfix">

        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    LẮC TAY, LẮC CHÂN
                    <a href="<?php echo Uri::base() ?>products/bangle/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($bangles as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <!-- danh muc do trang suc !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    HỘP ĐỰNG ĐỒ TRANG SỨC
                    <a href="<?php echo Uri::base() ?>products/jewelrybox/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($jewelry_box as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <!--danh muc thoi trang !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    ĐỒNG HỒ THỜI TRANG
                    <a href="<?php echo Uri::base() ?>products/clock/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($clocks as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                        </div>
                        <div class="caption">
                            <p style="text-align: center;">
                                <?php echo $value->name; ?>
                            </p>
                            <p style="color: red;">
                                <?php echo "Giá: " . $value->price; ?>
                            </p>
                            <?php if ($value->status == 1): ?>
                                <p style="color: red; float: left;">
                                    <?php echo "Sale Off : " . $value->saleoff . '%'; ?>
                                </p>

                            <?php endif; ?>
                            <p style="padding-left: 70%;">
                                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">Chi tiết</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
