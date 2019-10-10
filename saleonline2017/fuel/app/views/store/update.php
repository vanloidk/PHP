<div class="content-customize02">
    <div class="row col-md-10">
        <h3>Enter Delivery Address</h3>
        <div class="top-message">
            To add a new address simply use the automatic address finder below.
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="container" style="margin-top:10px">
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>Company Name:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('company', !empty($store->tdelivery) ? $store->tdelivery[1]->company : "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>Address1:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('address1', !empty($store->tdelivery) ? $store->tdelivery[1]->address_1 : "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>Address2:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('address2', !empty($store->tdelivery) ? $store->tdelivery[1]->address_2 : "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>City:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('city', !empty($store->tdelivery) ? $store->tdelivery[1]->city : "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>PostCode:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('postcode', !empty($store->tdelivery) ? $store->tdelivery[1]->postcode : "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-3">
                <label>County:</label>
            </div>
            <div class="col-lg-offset-3">
                <?php echo Form::input('county', !empty($store->tdelivery) ? $store->tdelivery[1]->country_id : "", array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>

</div>
