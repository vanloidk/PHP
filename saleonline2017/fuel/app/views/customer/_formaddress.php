<!-- Address Store !-->
<div class="container"  id="address_account">
    <div class="row row_cus" style="display: none;">
        <div class="col-lg-offset-3">
            <?php echo Form::input('id', !is_null($adress_account) ? $adress_account->id : "", array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Tên khách hàng:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('username', !is_null($adress_account) ? $adress_account->last_name : "", array('class' => 'form-control')); ?>
        </div>

    </div>
    
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Email:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('email', !is_null($adress_account) ? $adress_account->email : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Tên công ty:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('company', !is_null($adress_account) ? $adress_account->company : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Địa chỉ:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('address', !is_null($adress_account) ? $adress_account->address_1 : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Điện thoại:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('phone', !is_null($adress_account) ? $adress_account->address_1 : "", array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Thành phố</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::select('city', 'none', $city, array('class' => 'form-control', 'style' => 'width:250px;'));
            ?>
        </div>
    </div>

    <div class="row row_cus" id="strictId">
        <div class="col-lg-3">
            <label>Quận/Huyện</label>
        </div>
        <div class="col-lg-offset-3" >
            <?php echo Form::select('district', 'none', $district, array('class' => 'form-control', 'style' => 'width:250px; '));
            ?>
        </div>
    </div>

<!--    <div class="row row_cus">
        <div class="col-lg-3">
            <label>PostCode:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('postcode', !is_null($adress_account) ? $adress_account->postcode : "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Quốc Gia:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('county', !is_null($adress_account) ? $adress_account->country_id : "", array('class' => 'form-control')); ?>
        </div>
    </div>-->

    <div class="row">
        <div class="col-lg-2" style="width: 150px;">
            <label>Ghi chú:</label>
        </div>
        <div class="col-lg-offset-1" >
            <?php echo Form::textarea('note', "", array('class' => 'form-control', 'style' => 'width:90%;')); ?>
        </div>
    </div>
</div>
