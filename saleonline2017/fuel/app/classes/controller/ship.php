<?php

class Controller_Ship extends Controller_Base
{

    /**
     * Show data index
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_index()
    {
        var_dump("aaa"); exit();
        $data['mst_ship_work_time'] = Model_Mstshiftworktime::find('all', array('order_by' => array('shiftwork_name' => 'asc')));
        $this->template->title      = __('title.:label_index_title', array('label' => __('common.shift')));
        $this->template->content    = View::forge('ship/index', $data);
    }

    /**
     * Register Shift

     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_register()
    {
        $view        = View::forge('shift/register');
        $view->error = array();
        if (Input::method() == "POST") {
            $str_date_format = "Y-m-d H:i:s";
            $now_date        = new DateTime();
            $entry_post      = Input::post();
            //existed shiftwork_name
            $new_shift       = Model_Mstshiftworktime::forge(array(
                        'shiftwork_name' => Input::post('shiftwork_name'),
                        'lock'           => 0,
                        'opening_time'   => $entry_post['opening_time'],
                        'closing_time'   => $entry_post['closing_time'],
                        'create_date'    => $now_date->format($str_date_format)
            ));
            $val             = Model_Mstshiftworktime::validate('register_shift', $new_shift, Input::post());
            if ($val->run()) {
                if (!$new_shift->save()) { //error transaction
                    Session::set_flash('error', __('message.registration_failed'));
                } else {
                    Session::set_flash('success', __('message.shiftwork_:shiftwork_registered', array('shiftwork' => $new_shift->shiftwork_name)));
                    Response::redirect('shift/index');
                }
            } else {
                Session::set_flash('error', __('message.validation_error'));
                $view->error = $val->error_message();
            }
        }
        $this->template->title   = __('title.:label_register_title', array('label' => __('common.shift')));
        $this->template->content = $view;
    }

    /**
     * Edit Shift
     *
     * @param Int $id Id of Model_Mstshiftworktime
     * @return void
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_edit($id = null)
    {
        $view               = View::forge('shift/edit');
        $view->error        = array();
        $mst_ship_work_time = Model_Mstshiftworktime::find($id);
        if (!$mst_ship_work_time) {
            Session::set_flash('warning', __('message.:label_does_not_exist', array('label' => __('common.shift'))));
            Response::redirect('shift/index');
        }
        $view->mst_ship_work_time = $mst_ship_work_time;
        if (Input::method() == "POST") {
            //existed shiftwork_name
            $val = Model_Mstshiftworktime::validate('edit_shift', $mst_ship_work_time, Input::post());
            if ($val->run()) {
                $mst_ship_work_time->shiftwork_name = Input::post('shiftwork_name');
                $lock_post                          = Input::post('lock');
                if (empty($lock_post)) {
                    $mst_ship_work_time->lock = false;
                } else {
                    $mst_ship_work_time->lock = true;
                }
                $mst_ship_work_time->opening_time = Input::post('opening_time');
                $mst_ship_work_time->closing_time = Input::post('closing_time');

                // check shift in group
                $str_group_name = Model_Mstgroup::get_list_group_name_by_shift($id);
                if ($str_group_name != "" && $mst_ship_work_time->lock == true) {
                    Session::set_flash('warning', __('message.shift_lock_warning_:group_name', array('group_name' => $str_group_name)));
                } else {
                    if (!$mst_ship_work_time->save()) { //error transaction
                        Session::set_flash('error', __('message.registration_failed'));
                    } else {
                        Session::set_flash('success', __('message.shiftwork_:shiftwork_edited', array('shiftwork' => $mst_ship_work_time->shiftwork_name)));
                        Response::redirect('shift/index');
                    }
                }
            } else {
                Session::set_flash('error', __('message.validation_error'));
                $view->error = $val->error_message();
            }
        }
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.shift')));
        $this->template->content = $view;
    }

}
