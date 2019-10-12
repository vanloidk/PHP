<?php

class Controller_Sale_Customer extends Controller_Base {

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
     * @author Nguyen Van Loi
     */
    public function action_index() {

        $users = \Auth\Model\Auth_User::find('all', array('related' => array('metadata')));


        $config = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/sale/customer/',
            'total_items'    => 10,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Fuel\Core\Pagination::forge('sale/customer/index', $config);

        //   $this->addJs('function.js');
        $view       = View::forge('account/sale/customer/index');
        $account_id = input::post('id');
        $customer   = input::post('customer_id');
        //$customer_type = input::post('customer_type');
        $lock       = Input::post('lock');

        $accounts = Model_Account::getAccount($pagination, $account_id, $customer, $lock);

//        echo "<pre>";
//        foreach ($accounts as $value) {
//            var_dump($value->delivery);
//        }
//
//        echo "</pre>";
//        exit();
        //var_dump($accounts);
        //exit();
        $view->pagination        = $pagination;
        $view->accounts          = $accounts;
        $this->template->title   = "Customer";
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
     * @author Nguyen Van Loi
     */
    public function action_register() {
        $view                    = View::forge('sale/customer/register');
        $this->template->title   = "Register Account";
        $this->template->content = $view;
    }

    public function action_edit($id) {

        $view      = View::forge('account/sale/customer/edit');
        $customers = Model_Account::getAccountById($id);

        $view->customers = $customers;
        if (Input::method() == "POST") {
            //update account
            $customers->username = Input::post('username');
            $customers->email    = Input::post('email');

            foreach ($customers->delivery as $delivery) {
                $delivery->company   = Input::post('company');
                $delivery->gender    = Input::post('gender');
                $delivery->phone     = Input::post('phone');
                $delivery->address_1 = Input::post('address_1');
                $delivery->save();
            }
            $customers->save();

            if ($customers->save()) { //error transaction
                Session::set_flash('success', "Cập nhật thành công");
                Response::redirect('sale/customer');
            } else {
                Session::set_flash('error', "Cập nhật không thành công");
            }
        }

        $this->template->title   = "Sữa thông tin khách hàng";
        $this->template->content = $view;
    }

    public function action_search() {
        $view          = View::forge('account/sale/customer/index');
        $account_id    = input::post('customer_id');
        $customer      = input::post('customer_name');
        $customer_type = input::post('type');
        $lock          = Input::post('lock');

        $accounts = Model_Account:: getAccount($account_id, $customer, $customer_type, $lock);

        $view->accounts          = $accounts;
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    /**
     * Register account
     *
     * @param int $id Account id
     * @return void
     *
     * @access public
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_delete() {
        $customer = Model_Account::find(input::post('customerId'));

        $customer->delete();
    }

    
     /**
     * Register account
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function action_detail($id) {
        $view                    = View::forge('sale/customer/detail');
        
        $orders = Model_Torder::getLstOrder();
        
        if(Input::method()=='POST')
        {
            
        }
        
        $view->orders = $orders;
        $this->template->title   = "Chi tiết đơn đặt hàng";
        $this->template->content = $view;
    }

    
    public function action_orderTracking() {
        $view                                     = View::forge('account/orderTracking');
        $this->template->title                    = __('title.:label_edit_title', array('label' => __('common.account')));
        $this
                ->template->content = $view;
    }

    public function action_communications() {
        $view                    = View::forge('account/communications');
        $this->template->title   = __('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

}
