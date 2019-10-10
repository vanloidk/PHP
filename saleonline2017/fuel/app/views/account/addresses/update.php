<div class="content-customize02">
    <div class="row col-md-10">

        <div class="top-message">
            <h3>Enter Delivery Address</h3>
            To add a new address simply use the automatic address finder below.
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" style="margin-top:10px">
        <form action="" method="post" class="form-horizontal" role="form" accept-charset="utf-8">

            <div class="row"  style="display: none;">
                <?php echo Form::input('id', $account != NULL ? $account->id : "", array('class' => 'form-control')); ?>
            </div>

            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>First Name:</label>
                </div>
                <div  class="col-lg-offset-3">
                    <?php echo Form::input('first_name', $account != NULL ? $account->first_name : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>Last Name:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('last_name', $account != NULL ? $account->last_name : "", array('class' => 'form-control')); ?>
                </div>

            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>Company Name:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('company', $account != NULL ? $account->company : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>Address1:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('address1', $account != NULL ? $account->address_1 : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>Address2:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('address2', $account != NULL ? $account->address_2 : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>City:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('city', $account != NULL ? $account->city : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>PostCode:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('postcode', $account != NULL ? $account->postcode : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="row row_cus">
                <div class="col-lg-3">
                    <label>County:</label>
                </div>
                <div class="col-lg-offset-3">
                    <?php echo Form::input('country_id', $account != NULL ? $account->country_id : "", array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submit"  class="btn btn-primary" style=" float: right">
                    Update  </button>
            </div>
        </form>
    </div>
</div>
