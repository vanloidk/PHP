<?php

class Controller_Sale_OrderProduct extends Controller_Base
{

        public function before()
        {
                parent::before();
                $this->addJs('account.js');
        }

        public function action_index()
        {
                $view = View::forge('account/sale/orderProduct/index');

                //Model_Account::getOrder();
                $orders                  = Model_Torder::find('all'); //getLstOrder();
                $view->orders            = $orders;
                $this->template->title   = "Order Product";
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

        public function action_search()
        {
                $view                    = View::forge('account/sale/order/index');
                $oder_id                 = input::post('oder_id');
                $customer                = input::post('customer');
                $order_status            = input::post('order_status');
                $rsOrders                = Model_Torder::searchOrder($oder_id, $customer, $order_status);
                //  var_dump($rsOrders);exit();
                $view->orders            = $rsOrders;
                $this->template->title   = "Register Account";
                $this->template->content = $view;
        }

        public function action_approveOrder()
        {
                $order         = Model_Torder::find(input::post('orderId'));
                $order->status = 1;
                $order->save();
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

        public function action_approve()
        {
                $view                    = View::forge('customer/delivery');
                $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
                $this->template->content = $view;
        }

        public function action_ProductOrder()
        {
                var_dump("aaa");exit();
        }

}
