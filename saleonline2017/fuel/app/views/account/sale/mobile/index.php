<div class="content-customize">
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>ID: </label>
        </div>
        <div  class="col-lg-offset-2">
            <?php echo Form::input('Name', "", array('class' => 'form-control', "style" => 'width: 300px;')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Name:</label>
        </div>
        <div  class="col-lg-offset-3">
            <?php echo Form::input('Name', "", array('class' => 'form-control')); ?>
        </div>
    </div>
    <div class="row row_cus">
        <div class="col-lg-3">
            <label>Category:</label>
        </div>
        <div class="col-lg-offset-3">
            <?php echo Form::input('Category', "", array('class' => 'form-control', "style" => 'width: 300px;')); ?>
        </div>
    </div>

    <div class="row row_cus">
        <a href="<?php echo Uri::base() . 'account/admin/search' ?>" class="btn btn-default pull-right" >
            Search
        </a>
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
                <th><?php echo "Image"; ?></th>
                <th><?php echo "Name"; ?></th>
                <th><?php echo "Serial number"; ?></th>
                <th><?php echo "Category"; ?></th>
                <th><?php echo "Price"; ?></th>
                <th><?php echo "Quatilty"; ?></th>
                <th><?php echo "status"; ?></th>
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>
            <?php foreach ($tproduct as $key => $value): ?>
                <tr>
                    <td><?php echo $value->img; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->serial_number; ?></td>
                    <td><?php echo $value->category_id; ?></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->quatility; ?></td>
                    <td><?php echo $value->status; ?></td>
                </tr>
            <?php endforeach; ?>
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
