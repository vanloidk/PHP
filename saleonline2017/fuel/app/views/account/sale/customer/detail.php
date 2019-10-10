<div class="content-customize">
    <div class="row ">
        <h4>
            Details Product...
        </h4>
        <hr>
    </div>
    <div class="col-md-4">
        <div class="thumbnail">

            <img alt="300x250" src= <?php echo Uri::base() ?>assets/img/<?php echo $entity_prod->img; ?>>
            <div class="caption">
                <p>
                    <?php $entity_prod->name; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-offset-4">
            <div>
                <p>
                    Name SP.
                </p>
            </div>

            <div>
                <hr>
                <p>
                    information products.
                </p>
            </div>
            <div>
                <hr>
                <p>
                    price products.
                </p>
            </div>
        </div>
    </div>

    <div class="row col-md-offset-10" style="padding-top: 20px;">

        <a class="btn btn-primary" href="<?php echo Uri::base() ?>products/laptop/cart/<?php echo $entity_prod->id; ?>"> Add to bag</a>
    </div>
    <br>
    <div class="row" style="margin-top: -35px;">
        <div class="col-md-12 column">
            <hr>
            <p>
                Footer information company
            </p>
        </div>
    </div>
</div>
