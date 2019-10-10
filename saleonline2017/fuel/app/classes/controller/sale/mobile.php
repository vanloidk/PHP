<?php

class Controller_Sale_Mobile extends Controller_Base
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
        $view                    = View::forge('account/sale/mobile/index');
        $this->template->title   = "Mobile";
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
        $view                    = View::forge('position/edit');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.position')));
        $this->template->content = $view;
    }

    /**
     * Index Shift Position
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     * @since 1.0
     */
    public function action_detail()
    {
        $view                    = View::forge('account/sale/mobile/detail');
        $this->template->title   = "Laptop details";
        $this->template->content = $view;
    }

}
