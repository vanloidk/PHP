<?php

/**
 * /account.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license 
 */
/**
 * Account
 *
 * <pre>
 * </pre>
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license 
 */
class Controller_Account_Addresses extends Controller_Base
{

    /**
     * before action
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguen Van Loi
     */
    public function before()
    {
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
     * @author Nguen Van Loi
     */
    public function action_index()
    {

        $view                    = View::forge('account/addresses/index');
        $this->template->title   = "Address Index";//__('title.:label_index_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_addDelivery()
    {
        $view                    = View::forge('account/addresses/addDelivery');
        $this->template->title   = "Add delivery"; // __('title.:label_index_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_changeAddress()
    {
        $view                    = View::forge('account/addresses/changeAddress');
        $this->template->title   ="Edit Address"; // __('title.:label_index_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_update()
    {
        $view          = View::forge('account/addresses/update');
        $account_info  = Auth::get_user_id();
        $account       = Model_Mdelivery::get_address_by_user_id($account_info[1], 1);
        $view->account = $account;

        If (Input::method() == "POST") {
            $delivery_post = Input::post();

            $address_delivery             = Model_Mdelivery::find($delivery_post['id']);
            $address_delivery->first_name = $delivery_post['first_name'];
            $address_delivery->company    = $delivery_post['company'];
            $address_delivery->address_1  = $delivery_post['address1'];
            $address_delivery->address_2  = $delivery_post['address2'];
            $address_delivery->city       = $delivery_post['city'];
            $address_delivery->postcode   = $delivery_post['postcode'];
            $address_delivery->country_id = $delivery_post['country_id'];

            if (!$address_delivery->save()) {
                Session::set_flash("process save failed");
            } else {

                Session::set_flash('success', "Update succeeded");
                Response::redirect('delivery/');
            }
        }

        $this->template->title   = "Address update";//__('title.:label_index_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

}
