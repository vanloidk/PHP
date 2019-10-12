<!--#F1649D-->

<div class="content-customize">
    <div class="row">
        <h4 style="color: red;">
            Kết quả tìm kiếm
        </h4>
        <hr style="border-style: solid; border-width: 2px;">
    </div>

    <!--danh muc bong tai !-->
    <div class="row clearfix">
        <div class="col-md-12 ">
            <?php if (!$products) echo "Không tìm thấy sản phẩm nào!!"; ?>

            <?php foreach ($products as $key => $value): ?>
                <div class="col-md-3 padding-product">
                    <div class="thumbnail">
                        <div>
                            <a class="btn" href="<?php echo Uri::base() ?>product/detail/<?php echo str_replace(" ", "-", $value->name) . "-" . $key . ".html";?>">
                                <img style="width: 220px; height: 140px;" src= <?php echo Uri::base() ?>assets/img/<?php echo $value->img; ?>>
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
