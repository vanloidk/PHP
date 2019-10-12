<!--#F1649D-->

<div class="content-customize">
    <div class="row clearfix">
        <h4>
            Trang chủ
        </h4>
        <hr>
    </div>

    <!--danh muc bong tai !-->
    <div class="row">
        <div>
            <div>
                <h2 class="title">
                    BÔNG TAI
                    <a href="<?php echo Uri::base() ?>products/earring/">Xem tất cả>></a>
                </h2>
            </div>

            <div class="owl-carousel owl-carousel3">
                <?php foreach ($earrings as $key => $value): ?>
                    <div class="padding-product ">
                        <div class="thumbnail">
                            <div class="item animate-box">
                                <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img  style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img; ?>>
                                </a>
                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>
                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!--danh muc nhan !-->
    <div class="row">
        <div>
            <div>
                <h2 class="title">
                    NHẪN
                    <a href="<?php echo Uri::base() ?>products/ring/">Xem tất cả>></a>
                </h2>
            </div>
            <div class="owl-carousel owl-carousel3">
                <?php foreach ($rings as $key => $value): ?>
                    <div class="padding-product">
                        <div class="thumbnail">
                            <div>
                                <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                                </a>

                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>

                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!--danh muc day chuyen co !-->
    <div class="row clearfix">
        <div>
            <div>
                <h2 class="title">
                    DÂY CHUYỀN CỔ
                    <a href="<?php echo Uri::base() ?>products/necklace/">Xem tất cả>></a>
                </h2>
            </div>
            <div class="owl-carousel owl-carousel3">
                <?php foreach ($necklaces as $key => $value): ?>
                    <div class="padding-product">
                        <div class="thumbnail">
                            <div>
                                <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                                </a>
                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>
                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!--danh muc lac tay, lac chan !-->
    <div class="row clearfix">

        <div>
            <div>
                <h2 class="title">
                    LẮC TAY, LẮC CHÂN
                    <a href="<?php echo Uri::base() ?>products/bangle/">Xem tất cả>></a>
                </h2>
            </div>
            <div class="owl-carousel owl-carousel3">
                <?php foreach ($bangles as $key => $value): ?>
                    <div class="padding-product">
                        <div class="thumbnail">
                            <div>
                                <a  href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                                </a>

                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>
                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- danh muc do trang suc !-->
    <div class="row clearfix">
        <div>
            <div>
                <h2 class="title">
                    HỘP ĐỰNG ĐỒ TRANG SỨC
                    <a href="<?php echo Uri::base() ?>products/jewelrybox/">Xem tất cả>></a>
                </h2>
            </div>
            <div class="owl-carousel owl-carousel3">
                <?php foreach ($jewelry_box as $key => $value): ?>
                    <div class="padding-product">
                        <div class="thumbnail">
                            <div>
                                <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                                </a>
                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>

                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!--danh muc thoi trang !-->
    <div class="row clearfix">
        <div>
            <div>
                <h2 class="title">
                    ĐỒNG HỒ THỜI TRANG
                    <a href="<?php echo Uri::base() ?>products/clock/">Xem tất cả>></a>
                </h2>
            </div>
            <div class="owl-carousel owl-carousel3">
                <?php foreach ($clocks as $key => $value): ?>
                    <div class="padding-product">
                        <div class="thumbnail">
                            <div>
                                <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                                    <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                                </a>
                            </div>
                            <div class="caption">
                                <div>
                                    <p style="text-align: left;">
                                        <?php echo $value->name; ?>
                                    </p>
                                </div>

                                <div style="padding-bottom: 10px;">
                                    <span style="color: red;">
                                        <?php echo "Giá: " . $value->price; ?> 
                                    </span>
                                    <span style="color:darkgrey; ">
                                        <?php if ($value->status == 1): ?>
                                            <?php echo "|| Giảm Giá : " . $value->saleoff . '%'; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
