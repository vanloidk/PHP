<div class="contents">
    <div class="row header-ctn">
        <h3 class="page-header header_custom">
            <?php echo __('common.:label_index_header', array('label' => __('common.position'))); ?>
        </h3>
        <div class="form-ctn">
            <a href="<?php echo Uri::base() . 'position/register' ?>" class="btn btn-success pull-right"><?php echo __('common.register'); ?></a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="width-of-first-col"><?php echo __('common.position'); ?></th>
                <th><?php echo __('common.action'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mst_shift_position as $key => $val): ?>
                <tr class="<?php echo $val['lock'] == 1 ? 'lock' : "" ?>">
                    <td><?php echo $val['position_name']; ?></td>
                    <td>
                        <a href="<?php echo Uri::base() . 'position/edit/' . $val['id'] ?>" class="btn btn-info btn-sm"><?php echo __('common.edit'); ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>