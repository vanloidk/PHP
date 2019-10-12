<div class="row clearfix">
    <div class="col-md-12 ">
        <div class="row">
            <?php foreach ($bangles as $key => $value): ?>
                <div class="col-md-3 padding-product">
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
    <div class="pagination" style="float: right;">
        <?php echo html_entity_decode($pagination) ?>
    </div>
</div>

