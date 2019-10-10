<div class="content-customize">

    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Inventory Name:</label>
        </div>
        <div  class="col-lg-offset-3">
            <?php echo Form::input('Inventory Name', "", array('class' => 'form-control')); ?>
        </div>
    </div>

    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Type:</label>
        </div>
        <div  class="col-lg-offset-3">
            <?php echo Form::input('Type', "", array('class' => 'form-control')); ?>
        </div>
    </div>

    <hr>
    <div class="header-lbl">
        <a href="<?php echo Uri::base() . 'account/admin/new' ?>" class="btn btn-primary pull-right" >
            Add
        </a>
    </div>

    <br>

    <table class="table ">
        <thead>
            <tr class="header_tr">
                <th><?php echo "Inventory Name"; ?></th>
                <th><?php echo "type"; ?></th>
                <th><?php echo "Qty"; ?></th>
                <th><?php echo "Price"; ?></th>
                <th><?php echo "Status"; ?></th>
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>
        </tbody>
    </table>

    <br>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <hr>
            <p>
                Footer information company
            </p>
        </div>
    </div>
</div>
