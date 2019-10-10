<?php

class Controller_customer extends Controller_Base {

    /**
     * before action
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    /**
     * account index
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public function action_index() {

        $view                    = View::forge('customer/index');
        $accounts                = Auth_User::find("all");
        $groups                  = Model_Group::get_group(true);
        $view->groups            = $groups;
        $view->lstaccount        = $accounts;
        $this->template->title   = "Khách hàng";
        $this->template->content = $view;
    }

    /**
     * Register account
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public function action_register() {
        $view                    = View::forge('account/register');
        $this->template->title   = "Register Account";
        $this->template->content = $view;
    }

    /**
     * Register account
     *
     * @param int $id Account id
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public function action_edit() {
        $view                    = View::forge('account/edit');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_customer() {

        $view                    = View::forge('customer/delivery');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_orderTracking() {
        $view                    = View::forge('account/orderTracking');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_communications() {
        $view                    = View::forge('account/communications');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

}
