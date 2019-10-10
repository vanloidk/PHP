<?php

class Controller_Sale_Inventory extends Controller_Base
{

        public function before()
        {
                parent::before();
                $this->addJs('account.js');
        }

        public function action_index()
        {

                $view                    = View::forge('account/sale/inventory/index');
                $this->template->title   = "Inventory";
                $this->template->content = $view;
        }

        public function action_register()
        {
                $view                    = View::forge('account/register');
                $this->template->title   = "Register Account";
                $this->template->content = $view;
        }

        public function action_edit()
        {
                $view                    = View::forge('account/edit');
                $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
                $this->template->content = $view;
        }

        public function action_customer()
        {
                var_dump("adfasf");
                exit();

                $view                    = View::forge('customer/delivery');
                $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
                $this->template->content = $view;
        }

        public function action_orderTracking()
        {
                $view                    = View::forge('account/orderTracking');
                $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
                $this->template->content = $view;
        }

        public function action_communications()
        {
                $view                    = View::forge('account/communications');
                $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
                $this->template->content = $view;
        }

}
