<div class="content-customize02">
    <form action="search" method="post">
        <div class="row row_cus">
            <div class="col-lg-4">
                <label>Customer ID:</label>
            </div>
            <div  class="col-lg-offset-4">
                <?php echo Form::input('customer_id', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row row_cus">
            <div class="col-lg-4">
                <label>Customer Name:</label>
            </div>
            <div  class="col-lg-offset-4">
                <?php echo Form::input('customer_name', "", array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row row_cus">
            <div class="col-lg-4">
                <label>Customer Type:</label>
            </div>
            <div class="col-lg-offset-4">
                <?php echo Form::input('type', "", array('class' => 'form-control')); ?>
            </div>
        </div>

        <div class="row row_cus">
            <button type="submit" value="submit" class="btn btn-default pull-right" >
                Search
            </button>

        </div>
    </form>

    <hr>
    <div class="header-lbl">
        <a href="<?php echo Uri::base() . 'sale/customer/register' ?>" class="btn btn-primary pull-right" >
            Add
        </a>
    </div>

    <br>

    <table class="table ">
        <thead>
            <tr class="header_tr">
                <th><?php echo "Customer Name"; ?></th>
                <th><?php echo "First Name"; ?></th>
                <th><?php echo "Last Name"; ?></th>
                <th><?php echo "Email"; ?></th>
                <th><?php echo "Type"; ?></th>
                <th><?php echo "Language"; ?></th>
                <th colspan="2">Process</th>
<!--                <th><?php echo "Status Order"; ?></th>-->
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>
            <?php foreach ($accounts as $key => $value) : ?>
                <tr id="tr_<?php echo $value->id ?>">

                    <td><?php echo $value->username; ?></td>
                    <td><?php echo $value->first_name; ?></td>
                    <td><?php echo $value->last_name; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php $value->type; ?></td>
                    <td><?php echo $value->lang; ?></td>
                    <td>
                        <a href="<?php echo Uri::base() . "sale/customer/edit/" . $value->id; ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a type="submit" onclick="deleteCustomer('<?php echo $value->id ?>');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="pagination">
        <?php echo html_entity_decode($pagination) ?>
    </div>
    <br>
</div>


<script>
    function  deleteCustomer(customerId)
    {
        $.ajax({
            url: base_url + "sale/customer/delete/",
            type: "POST",
            data: {customerId: customerId},
            async: false,
            success: function () {
                $("#tr_" + customerId).remove();
            },
            error: function () {
                alert("failed");
            }
        });
    }
</script>



