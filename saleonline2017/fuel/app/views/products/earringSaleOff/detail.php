<div class="content-customize02">
    <div class="row ">
        <h4>
            Thông tin chi tiết sp
        </h4>
        <hr>
    </div>
    <div class="col-md-4">
        <div class="thumbnail">

            <img alt="300x250" src= <?php echo Uri::base() ?>assets/img/<?php echo $products->img; ?>>
        </div>
    </div>

    <div class="container">
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
            </div>
        </div>
    </div>

    <div class="row col-md-offset-10" style="padding-top: 20px;">

        <a class="btn btn-primary" href="<?php echo Uri::base() ?>products/earring/cart/<?php echo $products->id; ?>"> Cho vào giỏ hàng</a>
    </div>
</div>
