<!--#F1649D-->
<!--danh muc bong tai !-->
<div class="row clearfix">
    <div class="col-md-12 ">
        <?php if (count($earrings) > 0): ?>
            <div>
                <h2 class="title">
                    BÔNG TAI
                    <a href="<?php echo Uri::base() ?>products/earringSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>


        <?php foreach ($earrings as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <a href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html"; ?>">
                            <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img; ?>>
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
<!--danh muc nhan !-->
<div class="row clearfix">
    <div class="col-md-12 ">
        <?php if (count($rings) > 0): ?>
            <div>
                <h2 class="title">
                    NHẪN
                    <a href="<?php echo Uri::base() ?>products/ringSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>

        <?php foreach ($rings as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                    </div>
                    <div class="caption">
                        <div>
                            <p style="text-align: center;">
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

<!--danh muc day chuyen co !-->
<div class="row clearfix">
    <div class="col-md-12 ">
        <?php if (count($necklaces) > 0): ?>
            <div>
                <h2 class="title">
                    DÂY CHUYỀN CỔ
                    <a href="<?php echo Uri::base() ?>products/necklaceSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>

        <?php foreach ($necklaces as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                    </div>
                    <div class="caption">
                        <div>
                            <p style="text-align: center;">
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

<!--danh muc lac tay, lac chan !-->
<div class="row clearfix">

    <div class="col-md-12 ">
        <?php if (count($bangles) > 0): ?>
            <div>
                <h2 class="title">
                    LẮC TAY, LẮC CHÂN
                    <a href="<?php echo Uri::base() ?>products/bangleSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>

        <?php foreach ($bangles as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                    </div>
                    <div class="caption">
                        <div>
                            <p style="text-align: center;">
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
<!-- danh muc do trang suc !-->
<div class="row clearfix">
    <div class="col-md-12 ">
        <?php if (count($jewelry_box) > 0): ?>
            <div>
                <h2 class="title">
                    HỘP ĐỰNG ĐỒ TRANG SỨC
                    <a href="<?php echo Uri::base() ?>products/jewelryboxSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>

        <?php foreach ($jewelry_box as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                    </div>
                    <div class="caption">
                        <div>
                            <p style="text-align: center;">
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
<!--danh muc thoi trang !-->
<div class="row clearfix">
    <div class="col-md-12 ">
        <?php if (count($clocks) > 0): ?>
            <div>
                <h2 class="title">
                    ĐỒNG HỒ THỜI TRANG
                    <a href="<?php echo Uri::base() ?>products/clockSaleOff/">Xem tất cả>></a>
                </h2>
            </div>
        <?php endif; ?>

        <?php foreach ($clocks as $key => $value): ?>
            <div class="col-md-3 padding-product">
                <div class="thumbnail">
                    <div>
                        <img style="width: 100%; height: 180px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img ?>>
                    </div>
                    <div class="caption">
                        <div>
                            <p style="text-align: center;">
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
