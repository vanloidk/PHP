<div class="container" style="margin-top:10px; display: none;" id="address_store">
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Company Name:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_company', !is_null($store_account) ? $store_account->company : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Address1:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_address1', !is_null($store_account) ? $store_account->address_1 : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Address2:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_address2', !is_null($store_account) ? $store_account->address_2 : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>City:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_city', !is_null($store_account) ? $store_account->city : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>PostCode:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_postcode', !is_null($store_account) ? $store_account->postcode : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>County:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('s_county', !is_null($store_account) ? $store_account->country_id : "", array('class' => 'form-control')); ?>
        </div>
    </div>
</div>

<!-- Address Customer  !-->
<div class="clearfix"></div>