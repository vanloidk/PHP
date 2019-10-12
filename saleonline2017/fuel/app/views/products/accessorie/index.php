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
                    BA LÔ
                    <a href="<?php echo Uri::base() ?>products/backpack/">Xem tất cả>></a>
                </h2>
            </div>


            <?php foreach ($backpacks as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <a href="<?php echo Uri::base() ?>product/detail/<?php echo $key; ?>">
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
    <!--danh muc túi xách !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <div>
                <h2 class="title">
                    TÚI XÁCH
                    <a href="<?php echo Uri::base() ?>products/handbag/">Xem tất cả>></a>
                </h2>
            </div>

            <?php foreach ($handbags as $key => $value): ?>
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
