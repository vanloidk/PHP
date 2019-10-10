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
        <a href="<?php echo Uri::base() . 'sale/laptop/new' ?>" class="btn btn-primary pull-right" >
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
                <th><?php echo "Status"; ?></th>
                <th colspan="2"><?php echo "Process"; ?></th>
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>

            <?php foreach ($tproduct as $key => $value): ?>

                <?php foreach ($value['tproduct'] as $key => $prod): ?>
                    <tr id="tr_<?php echo $prod->id; ?>">
                        <td> <img width="50px;" height="30px;" src="<?php echo Uri::base() . "assets/img/" . $prod->img ?>"></img></td>
                        <td><?php echo $prod->name; ?></td>
                        <td><?php echo $prod->serial_number; ?></td>
                        <td><?php echo $prod->category_id; ?></td>
                        <td><?php echo $prod->price; ?></td>
                        <td><?php echo $prod->quantity; ?></td>
                        <td><?php echo $prod->status; ?></td>
                        <td>
                            <a type="submit" href="<?php echo Uri::base() . "sale/laptop/edit/" . $prod->id ?>">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a type="submit" onclick="deleteLaptop('<?php echo $prod->id; ?>');">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<script>
    function  deleteLaptop(laptopId)
    {
        $.ajax({
            url: base_url + "sale/laptop/delete/",
            type: "POST",
            data: {laptopId: laptopId},
            async: false,
            success: function () {
                $("#tr_" + laptopId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>

