<?php

class Controller_Sale_OrderAccepted extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('account.js');
    }

    public function action_index() {
        $view   = View::forge('account/sale/orderaccepted/index');
        //Model_Account::getOrder();
        $orders = Model_Torder::getLstOrderAccepted(); //getLstOrder();

        $account = null;
        foreach ($orders as $value) {
            $account = $value->account;
        }

        $view->account           = $account;
        $view->orders            = $orders;
        $this->template->title   = "Order";
        $this->template->content = $view;
    }

    public function action_register() {
        $view                    = View::forge('account/register');
        $this->template->title   = "Register Account";
        $this->template->content = $view;
    }

    public function action_edit() {
        $view                    = View::forge('account/edit');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_search() {
        $view                    = View::forge('account/sale/order/index');
        $oder_id                 = input::post('oder_id');
        $customer                = input::post('customer');
        $order_status            = input::post('order_status');
        $rsOrders                = Model_Torder::searchOrderAccepted($oder_id, $customer, $order_status);
        //  var_dump($rsOrders);exit();
        $view->orders            = $rsOrders;
        $this->template->title   = "Register Account";
        $this->template->content = $view;
    }

    public function action_acceptOrder() {
        $order         = Model_Torder::find(input::post('orderId'));
        $order->status = 2;
        $order->save();
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

    /**
     *
     */
    public function action_orderCancel() {
        $order         = Model_Torder::find(input::post('orderId'));
        $order->status = -1;
        $order->save();
    }

    public function action_detail($id) {


        $view    = View::forge('account/sale/orderaccepted/detail');
        $orders  = Model_Torder::getOrderByOrderId($id);
        $account = $orders->account;

        //find delivery by account_id
        if (!empty($account->id)) {
            $delivery = Model_Mdelivery::get_delivery_by_account_id($account->id);
        } else {
            $delivery = new Model_Mdelivery();
        }

        $view->orders            = $orders;
        $view->account           = $account;
        $view->delivery          = $delivery;
        $this->template->title   = "Chi tiết đơn hàng";
        $this->template->content = $view;
    }

    public function action_deleteOrder() {

        $order = Model_Torder::find(input::post('orderId'));
        $order->delete();
    }

}
