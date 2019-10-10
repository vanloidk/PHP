<div class="content-customize02">
    <div class="row ">
        <h4>
            Thông sp
        </h4>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="300x250" src= <?php echo Uri::base() ?>assets/img/<?php echo $products->img; ?>>
                </div>
            </div>
            <div class="col-md-offset-4">
                <div>
                    <p>
                        Number: <?php echo $products->serial_number; ?>
                    </p>
                </div>

                <div>
                    <hr>
                    <p>
                        Name product: <?php echo $products->name; ?>
                    </p>
                </div>
                <div>
                    <hr>
                    <p>
                        Price: <?php echo $products->price; ?>
                    </p>
                    <p style="color: red;">
                        <?php if ($products->saleoff != 0) echo "Saleoff: " . $products->saleoff . "%"; ?>
                    </p>
                </div>
            </div>
            <div class="row col-md-offset-10" style="padding-top: 20px;">

                <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/cart/<?php echo $products->id; ?>">Cho vào giỏ hàng</a>
            </div>
        </div>

        <hr style="border-color: #000;">
        <!-- detail products !-->
        <div class="row">
            <div class="col-md-4">
                <?php if ($products->tproductdtl != null): ?>
                    <p>Chi tiết sp </p>
                    <?php
                    foreach ($products->tproductdtl as $productdtl):
                        ?>
                        <div> <?php echo html_entity_decode($productdtl->img); ?><div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
