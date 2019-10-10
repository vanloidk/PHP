<div class="content-customize">
    <div class="row clearfix">
        <h4>
            <?php echo $new->name; ?>
        </h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="thumbnail">

                <img style="width: 600px; height: 300px;" src= "<?php echo Uri::base() ?>assets/imgnews/<?php echo $new->img; ?>">
            </div>
        </div>
    </div>

    <div class="row" style="padding-top: 5px;">
        <div class="col-md-12">

            <p>
                <?php echo $new->description; ?>
            </p>

        </div>
    </div>



</div>
