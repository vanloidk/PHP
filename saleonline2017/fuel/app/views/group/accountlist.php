<div class="contents">
    <div class="row header-ctn">
        <h3 class="page-header header_custom" >
            <?php echo __('common.:label_index_header', array('label' => __('common.group'))); ?>
        </h3>
        <div class="form-ctn">
            <a href="<?php echo Uri::base() . 'group/register'; ?>" class="btn btn-success pull-right"><?php echo __('common.register') ?></a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>

                <th><?php echo "id" ?></th>

                <th><?php echo "name"; ?></th>

                <th><?php echo "User Id"; ?></th>
                <th ><?php echo "Process"; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($account_list as $key => $value): ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value->name?></td>
                <td><?php echo $value->user_id?></td>
                <td>
                    <a href="<?php echo Uri::base() . 'group/edit/' . $key ?>" class="btn btn-primary">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="<?php echo Uri::base() . 'group/accountList/' . $key ?>" class="btn btn-primary">
                        Edit
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>