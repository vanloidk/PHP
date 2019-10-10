<div class="content-customize">
    <div class="row clearfix">
        <h4>
            TIN TỨC
        </h4>
        <hr>
    </div>
    <?php $count = 0; ?>

    <?php foreach ($news as $key => $value): $count++; ?>
        <?php if ($count > 1): ?>
            <hr style="margin-top: 5px; margin-bottom: 5px;">
        <?php endif; ?>

        <div class="container" >
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="<?php echo Uri::base() . 'news/detail/' . $value->id ?>" >
                        <img  src= "<?php echo Uri::base() ?>assets/imgnews/<?php echo $value->img; ?>">
                    </a>
                </div>
            </div>


            <div class="col-md-8">
                <div>
                    <p style="color: blue;">
                        <a href="<?php echo Uri::base() . 'news/detail/' . $value->id ?>" >
                            <?php echo $value->title; ?>
                        </a>
                    </p>
                    <p>
                        <?php echo substr($value->description, 0, 50) . ((strlen($value->description) > 50) ? '...' : ''); ?>
                    </p>
                    <p>
                        Ngày đăng: <?php echo $value->created_date; ?>
                    </p>

                    <p>
                        <?php echo $value->name; ?>
                    </p>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>
