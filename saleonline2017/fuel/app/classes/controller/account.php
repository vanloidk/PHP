<?php

class Controller_Account extends Controller_Base {

    /**
     * before action
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
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
        $view                    = View::forge('account/index');
        $this->template->title   = "Depdocla"; //__('title.:label_index_title', array('label' => "Sale Online System"));
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
        $this->template->title   = "Edit account"; //__('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_UpdateSignInDetails() {

        $view                    = View::forge('account/updateSignInDetails');
        $this->template->title   = "Update SignIn"; //__('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_orderTracking() {
        $view                    = View::forge('account/orderTracking');
        $this->template->title   = "Order Tracking "; //__('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_communications() {
        $view                    = View::forge('account/communications');
        $this->template->title   = "Account communications"; //__('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_aboutus() {
        $view                    = View::forge('account/aboutus');
        $this->template->title   = "About us";
        $this->template->content = $view;
    }

    public function action_contactus() {
        $view                    = View::forge('account/contactus');
        $this->template->title   = "Contact us";
        $this->template->content = $view;
    }

}
