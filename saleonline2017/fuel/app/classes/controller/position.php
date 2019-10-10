<?php

/**
 * /position.php
 *
 * @copyright Copyright (C) X-TRANS inc.
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */

/**
 * Position
 *
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
class Controller_Position extends Controller_Base
{

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_index()
    {
        $data['mst_shift_position'] = Model_Mstshiftposition::find('all', array('order_by' => array('position_name' => 'asc')));
        $this->template->title      = __('title.:label_index_title', array('label' => __('common.position')));
        $this->template->content    = View::forge('position/index', $data);
    }

    /**
     * Register Position Shift
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_register()
    {
        $view        = View::forge('position/register');
        $view->error = array();
        if (Input::method() == "POST") {
            $str_date_format = "Y-m-d H:i:s";
            $now_date        = new DateTime();
            //existed position_name
            $new_position    = Model_Mstshiftposition::forge(array(
                        'position_name' => Input::post('position_name'),
                        'create_date'   => $now_date->format($str_date_format),
                        'lock'          => false
            ));
            $val             = Model_Mstshiftposition::validate('register_position', $new_position);
            if ($val->run()) {
                if (!$new_position->save()) { //error transaction
                    Session::set_flash('error', __('message.registration_failed'));
                } else {
                    Session::set_flash('success', __('message.position_:position_registered', array('position' => Input::post('position_name'))));
                    Response::redirect('position/index');
                }
            } else {
                Session::set_flash('error', __('message.validation_error'));
                $view->error = $val->error_message();
            }
        }
        $this->template->title   = __('title.:label_register_title', array('label' => __('common.position')));
        $this->template->content = $view;
    }

    /**
     * Edit Shift Position
     *
     * @param int $id IdPosition
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_edit($id = null)
    {
        $view                = View::forge('position/edit');
        $view->error         = array();
        $view->shiftPosition = Model_Mstshiftposition::find($id);
        if (!$view->shiftPosition) {
            Session::set_flash('warning', __('message.:label_does_not_exist', array('label' => __('common.position'))));
            Response::redirect('position/index');
        }
        $mst_shift_position = $view->shiftPosition;
        //for case post
        if (Input::method() == "POST") {
            //existed position_name
            $val = Model_Mstshiftposition::validate('edit_position', $mst_shift_position);
            if ($val->run()) {
                $mst_shift_position->position_name = Input::post('position_name');
                $lock_post                         = Input::post('lock');
                if (empty($lock_post)) {
                    $mst_shift_position->lock = false;
                } else {
                    $mst_shift_position->lock = true;
                }

                //check position in mst_group
                $str_group_name = Model_Mstgroup::get_list_group_name_by_position($id);
                if ($str_group_name != "" && $mst_shift_position->lock == true) {
                    Session::set_flash('warning', __('message.position_lock_warning_:group_name', array('group_name' => $str_group_name)));
                } else {
                    if (!$mst_shift_position->save()) { //error transaction
                        Session::set_flash('error', __('message.registration_failed'));
                    } else {
                        Session::set_flash('success', __('message.position_:position_edited', array('position' => $mst_shift_position->position_name)));
                        Response::redirect('position/index');
                    }
                }
            } else {
                Session::set_flash('error', __('message.validation_error'));
                $view->error = $val->error_message();
            }
        }
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.position')));
        $this->template->content = $view;
    }

}
