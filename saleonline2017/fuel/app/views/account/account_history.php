<?php
$year_month = (isset($month_view)) ? explode('/', $month_view) : array();
$year = (count($year_month) > 1) ? $year_month[0] : '';
$month = (count($year_month) > 1) ? $year_month[1] : '';
?>
<div class="contents">
    <div class="row">
        <h3 class="page-header header_custom">
            <?php echo __('history.request_history') . ' - ' . $account_full_name . ' - ' . $year . '/' . $month; ?>
        </h3>
        <?php echo Form::open(array('class' => 'form-inline col-sm-12', 'id' => 'request-history', 'role' => 'form')) ?>
        <div class="row row-border-bottom">

            <!--Request type-->
            <div class="col-md-4">
                <div class="form-group ">
                    <label><?php echo __('common.select_request_type'); ?></label>
                </div>
                <div class="form-group">
                    <?php echo Form::select('request_type', $type_selected, $types, array('class' => 'form-control', 'id' => 'history-select-type')); ?>
                </div>
            </div>

            <?php echo Form::input('pre_mth_input', $pre_mth, array('hidden')) ?>
            <?php echo Form::input('nxt_mth_input', $nxt_mth, array('hidden')) ?>

            <div class="col-md-8">
                <div class="pull-right">
                    <div class="form-group ">
                        <label><?php echo __('request.view_month_label'); ?></label>
                    </div>
                    <div class="form-group">
                        <?php echo Form::input('month_view', $month_view, array('autocomplete' => 'off', 'class' => 'form-control selectmonth', 'id' => 'history-month', 'placeholder' => __('request.month_view'))); ?>
                    </div>
                    <!--button group-->
                    <div class="btn-group ">
                        <input type="submit" id="history-pre-month"  class="btn btn-primary" name="pre_month"     value="<?php echo __('request.btn_previous_month'); ?>">
                        <input type="submit" id="history-cur-month"  class="btn btn-default" name="current_month" value="<?php echo __('request.current_month_btn'); ?>">
                        <input type="submit" id="history-next-month" class="btn btn-primary" name="next_month"    value="<?php echo __('request.btn_next_month'); ?>">
                    </div>
                    <?php echo Form::error('month_view', $err); ?>
                </div>

            </div>

        </div>

        <?php echo Form::close() ?>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo __('common.date'); ?></th>
                    <th><?php echo __('request.type'); ?></th>
                    <th><?php echo __('request.history_time'); ?></th>
                    <th><?php echo __('common.detail'); ?></th>
                    <th><?php echo __('common.status'); ?></th>
                    <th><?php echo __('request.approvers'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $requestId => $requestValue) : ?>
                    <tr>
                        <td><?php echo date('m/d', strtotime($requestValue->request_date)); ?></td>
                        <td><?php echo $requestValue->request_type->request_name; ?></td>
                        <td>
                            <?php
                            $opening_time = ($requestValue->opening_time != null) ? date('H:i', strtotime($requestValue->opening_time)) : '';
                            $closing_time = ($requestValue->opening_time != null) ? date('H:i', strtotime($requestValue->closing_time)) : '';
                            if ((strlen($opening_time) > 0) and ( strlen($closing_time) > 0)) {
                                echo $opening_time . ' - ' . $closing_time;
                            } else {
                                if ($requestValue->day_off != '') {
                                    switch ($requestValue->day_off) {
                                        case FULL_DAY_OFF:
                                            echo __('type.full_day');
                                            break;
                                        case HALF_DAY_OFF:
                                            echo __('type.half_day');
                                            break;
                                        case WORKING:
                                        default :
                                            echo '-';
                                            break;
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <!--display all reason item of request-->
                            <?php foreach ($requestValue->request_item as $item): ?>

                                <!--display title of reason-->
                                <p class="no-margin" style="font-weight: bold">
                                    <?php echo $item->input_name; ?>
                                </p>

                                <!--display content of reason-->
                                <?php
                                $inputValues = explode(PHP_EOL, $item->input_value);
                                foreach ($inputValues as $item):
                                    ?>
                                    <p class="no-margin">
                                        <?php echo $item ?>
                                    </p>
                                <?php endforeach; ?>

                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php
                            if ($requestValue->completion == REQUEST_COMPLETION) {
                                $class = 'label-default';
                                $label = __('status.complete');
                            } else {
                                if ($requestValue->approval_status == REQUEST_REJECTED) {
                                    $class = 'label-danger';
                                    $label = __('status.rejected');
                                } elseif ($requestValue->approval_status == REQUEST_NEW) {
                                    $class = 'label-info';
                                    $label = __('status.pending');
                                } else { // REQUEST_APPROVED
                                    $class = 'label-success';
                                    $label = __('status.approved');
                                }
                            }
                            ?>
                            <span class="label <?php echo $class; ?>"><?php echo $label; ?></span>
                        </td>
                        <td>
                            <?php
                            $approverList = '';
                            foreach ($requestValue->request_approval as $approver) {
                                if ($approver->status == TRUE) {
                                    $full_name = $approver->account->last_name . ' ' . $approver->account->first_name;
                                    $approverList .= $full_name . "\n";
                                }
                            }
                            echo nl2br($approverList);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>