<div class="content-customize" style="padding-top: 15px;">
    <form action="search" method="post">

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

    <table class="table ">
        <thead>
            <tr class="header_tr">
                <th><?php echo "Khách hàng"; ?></th>
                <th><?php echo "Đơn vị công tác"; ?></th>
                <th><?php echo "phái"; ?></th>
                <th><?php echo "Ngày sinh"; ?></th>
                <th><?php echo "Điện thoại"; ?></th>
                <th><?php echo "Điạ chỉ"; ?></th>
                <th><?php echo "Email"; ?></th>

                <th colspan="2">Process</th>
<!--                <th><?php echo "Status Order"; ?></th>-->
            </tr>
        </thead>

        <tbody id='tbl_listaccount'>
            <?php foreach ($accounts as $key => $value) : ?>

                <tr id="tr_<?php echo $value->id ?>">
                    <?php
                    foreach ($value->delivery as $delivery) {
                        
                    }
                    foreach ($value->metadata as $metadata) {
                        
                    }
                    if ($delivery->gender == 1) {
                        $gender = "Nam";
                    } else {
                        $gender = "Nữ";
                    }
                    ?>
                    <td><?php echo $value->username; ?></td>
                    <td><?php echo $delivery->company; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($delivery->born_date)); ?></td>
                    <td><?php echo $delivery->phone; ?></td>
                    <td><?php echo $delivery->address_1; ?></td>
                    <td><?php echo $value->email; ?></td>

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



