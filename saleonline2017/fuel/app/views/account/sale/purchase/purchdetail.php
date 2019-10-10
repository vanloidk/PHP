<div class="content-customize02">
    <div>
        <h4>
            Purch Details
        </h4>
    </div>
    <hr>

    <table class="table " >
        <thead>
            <tr class="header_tr">
                <th style="width: 15%;"><?php echo "Order id"; ?></th>
                <th  style="width: 40%;"><?php echo "Name"; ?></th>
                <th  style="width: 20%;"><?php echo "Price"; ?></th>
                <th><?php echo "Quanity"; ?></th>

            </tr>
        </thead>

        <tbody id = "tbl_order">
            <?php foreach ($purchdtls as $value):
                ?>
                <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->product_name ?></td>
                    <td><?php echo $value->price ?></td>
                    <td><?php echo $value->quantity ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
