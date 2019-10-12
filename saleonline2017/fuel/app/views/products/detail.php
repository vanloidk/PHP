
<div class="container">
    <h4>
        Thông Tin sp
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <img class="zoom" style="width: 350px; height: 320px;" src="<?php echo Uri::base() ?>assets/img/<?php echo $products->img; ?>" data-zoom-image="<?php echo Uri::base() ?>assets/img/image1.jpg">
        </div>
        <div class="col-md-offset-4">
            <div>
                <p>
                    Mã sản phầm: <?php echo $products->serial_number; ?>
                </p>
            </div>

            <div>
                <hr>
                <p>
                    Tên sản phẩm: <?php echo $products->name; ?>
                </p>
            </div>
            <div>
                <hr>
                <p>
                    Giá: <?php echo $products->price; ?>
                </p>
                <p style="color: red;">
                    <?php if ($products->saleoff != 0) echo "Giảm giá: " . $products->saleoff . "%"; ?>
                </p>
            </div>
        </div>
        <div class="row col-md-offset-10" style="padding-top: 20px;">

            <a class="btn btn-primary" href="<?php echo Uri::base() ?>product/cart/<?php echo $products->id; ?>">Cho vào giỏ hàng</a>
        </div>
    </div>

    <hr style="border-color: #000;">
    <!-- detail products !-->

</div>

<div class="container">
    <div>
        <div class="produnctdtl">
            <ul>
                <li >
                    <a class="btn btn-primary" data-toggle="tab" href="#description">Mô tả</a>
                </li>
                <li >
                    <a class="btn btn-primary" data-toggle="tab" href="#review">Binh luận</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clear" style="clear: both;" >
    </div>
    <div class="col-md-12">
        <div class="produnctdtlCommon">
            <div id="description" class="tab-pane fade in active">
                <div class="form-group">
                    <div class="row">
                        <?php if ($products->tproductdtl != null): ?>
                            <?php
                            foreach ($products->tproductdtl as $productdtl):
                                ?>
                                <?php echo html_entity_decode($productdtl->img); ?>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <div id="review" class="tab-pane fade" >
                <?php echo Form::open(array('role' => 'form')); ?>
                <div class="form-group">

                    <div class="row">
                        <div>
                            <span>
                                <p>Rating: <input type="number" name="your_awesome_parameter" id="rating1" class="rating" data-clearable="remove"/></p>
                            </span>
                        </div> 
                        <div>
                            <?php echo Form::label("Họ và tên", "name", array('class' => 'control-label required')); ?>
                            <?php echo Form::input('name', null, array('class' => 'form-control')); ?>
                        </div>
                        <div>
                            <?php echo Form::label("Email", 'email', array('class' => "control-label required")); ?>
                            <?php echo Form::input('email', null, array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 5px;">
                        <div>
                            <?php echo Form::label("Đánh giá của bạn", 'evaluate', array('class' => "control-label required")); ?>
                            <?php echo Form::textarea('evaluate', null, array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div  style="margin-top: 5px;">
                        <button class="btn btn-info" type="submit"> Gửi </button>
                    </div>
                </div>
                <?php echo Form::close() ?>

            </div>
        </div>
    </div>


    <div class="clear" style="clear: both;" >
    </div >
    <div style="margin-top: 5px; padding-right: 7%;">
        <div>
            <div>
                <div class="otherProduct">
                    <div class="otherProduct-title">
                        Sản phẩm khác
                    </div>
                </div>
            </div>
            <div>
                <div class="owl-carousel owl-carousel2">

                    <?php foreach ($otherProducts as $key => $value): ?>
                        <div>
                            <div class="thumbnail">
                                <div >
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
        </div>
    </div>
</div>
<script>
    wheelzoom(document.querySelector('img.zoom'));
</script>
