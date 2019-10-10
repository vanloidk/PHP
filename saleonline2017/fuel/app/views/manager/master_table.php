<div class="contents">
    <div class="row">
        <h3 class="page-header header_custom"><?php echo __('manager.master_table') ?></h3>
    </div>
    <div class="row request-type">
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'account/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.account'))) ?>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'group/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.group'))) ?>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'shift/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.shift'))) ?>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'position/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.position'))) ?>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'type/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.type'))) ?>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primary" href="<?php echo Uri::base().'holiday/index'; ?>">
                <?php echo __('common.:label_index_header', array('label' => __('common.holiday'))) ?>
            </a>
        </div>
    </div>
</div>