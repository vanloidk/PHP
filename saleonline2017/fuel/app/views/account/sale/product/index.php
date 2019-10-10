<div class="content-customize" style="padding-top: 15px;">

    <!-- search !-->

    <form action="" method="post">
        <div class="row ">
            <div class="col-lg-2">
                <label>Name:</label>
            </div>
            <div  class="col-lg-5">
                <?php echo Form::input('nameProduct', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row" style="padding-top: 5px;">
            <div class="col-lg-2">
                <label>Category:</label>
            </div>

            <div class="col-lg-3">
                <select name="category" class="form-control">
                    <option value="-1" <?php echo "selected"; ?>>
                        all
                    </option>
                    <?php foreach ($category as $key => $value): ?>
                        <option value="<?php echo $value->id ?>" <?php if (!empty(Input::post('category') && $value->id == Input::post('category'))) echo "selected"; ?>>
                            <?php echo $value->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row row_cus">
            <input class="btn btn-default pull-right" type="submit" value="Search"/>
        </div>
    </form>

    <hr>
    <div class="header-lbl">
        <a href="<?php echo Uri::base() . 'sale/product/new' ?>" class="btn btn-primary pull-right" >
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
                <tr id="tr_<?php echo $value->id; ?>">
                    <td> <img width="50px;" height="30px;" src="<?php echo Uri::base() . "assets/img/" . $value->img ?>"></img></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->serial_number; ?></td>
                    <td><?php echo $value->category_id; ?></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->quantity; ?></td>
                    <td><?php echo $value->status; ?></td>
                    <td>
                        <a type="submit" href="<?php echo Uri::base() . "sale/product/edit/" . $value->id ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a type="submit" onclick="deleteLaptop('<?php echo $value->id; ?>');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <div class="pagination" style="float: right;">
        <?php echo html_entity_decode($pagination) ?>
    </div>
</div>

<script>
    function  deleteLaptop(laptopId) {
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

