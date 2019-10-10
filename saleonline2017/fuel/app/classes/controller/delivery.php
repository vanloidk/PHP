<?php

use Auth\Auth;
use Fuel\Core\Response;

//use Fuel\Tasks\Session;


class Controller_Delivery extends Controller_Base {

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
    //public $session;
    public function before() {
        parent::before();
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


        if (Input::method() == "POST") {

            //create shopping cart
            if (empty(Input::post('delivery_login'))) {
                $this->createOrder();
            }

            $accountLock = Model_Account::query()
                    ->select('id')
                    ->where('username', Input::post('account'))
                    ->where('lock', false)
                    ->get_one();
            //check exist role in user
            $account     = Model_Account::getUserByUserName(Input::post("account"));

            $accoutnIds = Model_accountroles::check_account_role($account->id, USER);

            if ($accountLock && $accoutnIds) {
                Session::set('login_port', USER_PORT);
                if (Auth::login()) {
                    //$this->createOrder();
                    Session::set('login_port', USER_PORT);

                    $this->template->title = "Depdocla | thanh toán";
                    Response::redirect('delivery/checkout01');
                } else {
                    Session::set('login_port', VISITOR_PORT);
                    Session::set_flash('error', "Đăng nhập không thành công");
                }
            } else {
                Session::set_flash('error', "Đăng nhập không thành công");
            }

            if (Input::post("account") == null) {
                Session::delete_flash('error');
            }
        } else {
            //  $this->createOrder();
            // var_dump(Session::get('orders')); exit();
        }

        // var_dump(Session::get('orders')); exit();
        $view                    = View::forge('delivery/index');
        $this->template->title   = "Depdocla | giao hàng";
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

    public function action_checkout() {

        $view         = View::forge('customer/checkout');
        $account_info = Auth::get_user_id();

        $store_account  = Model_Mdelivery::get_address_by_user_id($account_info[1], 0);
        $address_accout = Model_Mdelivery::get_address_by_user_id($account_info[1], 1);

        $view->city              = $this->getCity();
        $view->store_account     = $store_account;
        $view->adress_account    = $address_accout;
        $this->template->title   = "Depdocla | thanh toán";
        $this->template->content = $view;
    }

    public function createOrder() {
        $numProducts = Input::post('numProducts');
        $productDtl  = array();
        for ($i = 0; $i < $numProducts; $i++) {
            $orderProductDtl = new Model_Torderdtl;
            $proc            = Model_Tproduct::getProducts(Input::post('product_id')[$i]);

            //dtl
            $orderProductDtl->product_id = $proc->id;
            $orderProductDtl->name       = $proc->name;
            $orderProductDtl->price      = $proc->price;
            $orderProductDtl->quantity   = Input::post('ttl_items')[$i];
            $orderProductDtl->model      = $proc->serial_number;
            $orderProductDtl->img        = "test";
            $orderProductDtl->total      = Input::post('qty')[$i];
            $orderProductDtl->tax        = "0.1%";
            $productDtl[$i]              = $orderProductDtl;
        }

        //create order
        $order              = new Model_Torder;
        $order->name        = "modify";
        $order->ship_id     = "ship_id";
        $order->purch_id    = "purch_id";
        $order->invoice_no  = "hashcode";
        $order->store_id    = "hashcode";
        $order->language_id = "proc->language_id";
        $order->currency_id = "proc->currency_id";
        $order->status      = 1;
        $order->total       = Input::post('ttl_cart'); //save session product order

        Session::set('order', $order);
        Session::set('orderDtl', $productDtl);
    }

    public function action_checkout01() {


        $view            = View::forge('customer/checkout01');
        $account_info    = Auth::get_user_id();
        $store_account   = Model_Mdelivery::get_address_by_user_id($account_info[1], 0);
        $address_account = Model_Mdelivery::get_address_by_user_id($account_info[1], 1);
        if (Input::method() == "POST") {
            $this->createOrder();
        }

        $view->city              = $this->getCity();
        $view->store_account     = $store_account;
        $view->adress_account    = $address_account;
        $this->template->title   = "Depdocla | thanh toán";
        $this->template->content = $view;
    }

    public function action_makepayment() {

        $view     = View::forge('customer/checkout01');
        $flagsave = true;
        // insert t_order
        if (Input::method() == "POST") {

            //get max id order
            $maxId    = Model_Torder::getMaxOrderId();
            $order    = Session::get('order');
            $orderDtl = Session::get('orderDtl');
            //var_dump($order); exit();

            list(, $userId) = Auth::get_user_id();

            //save in order
            $orderNew              = new Model_Torder();
            $orderNew->ship_id     = $order->ship_id;
            $orderNew->name        = "ORD" . ($userId != null ? $userId : "VS" ) . "-" . $maxId;
            $orderNew->purch_id    = $order->purch_id;
            $orderNew->invoice_no  = $order->invoice_no;
            $orderNew->account_id  = $userId != null ? $userId : -1;
            $orderNew->store_id    = 0;
            $orderNew->language_id = 1;
            $orderNew->currency_id = 1;
            $orderNew->status      = 0;

            $orderNew->order_type = Input::post('paymentoptions');

            $orderNew->comment = Input::post('note');
            $orderNew->ship_id = 1;
            $orderNew->total   = $order->total;

            $orderNew->created_date = date('YYY-mm-dd', time());
            $orderNew->updated_date = date('YYY-mm-dd', time());

            if (!$orderNew->save()) {
                $flagsave = false;
            }

            //save in order_dtl

            foreach ($orderDtl as $value) {
                $orderDtl               = new Model_Torderdtl();
                $orderDtl->order_id     = $orderNew->id;
                $orderDtl->product_id   = $value->product_id;
                $orderDtl->name         = $value->name;
                $orderDtl->model        = $value->model;
                $orderDtl->quantity     = $value->quantity;
                $orderDtl->price        = $value->price;
                $orderDtl->total        = $value->total;
                $orderDtl->tax          = '0.2%';
                $orderDtl->created_date = date('YYY-mm-dd', time());
                $orderDtl->updated_date = date('YYY-mm-dd', time());

                if (!$orderDtl->save()) {
                    $flagsave = false;
                }
            }

            //find delivery by account
            $delivery = Model_Mdelivery::get_delivery_by_account_id($userId);
            if (count($delivery) > 0) { //update
                $delivery->account_id = $userId != null ? $userId : -1;
                $delivery->store_id   = 0;
                $delivery->gender     = 1;
                $delivery->last_name  = Input::post('username');
                $delivery->first_name = Input::post('username');
                $delivery->email      = Input::post('email');
                $delivery->address_1  = Input::post('address');
                $delivery->phone      = Input::post('phone');
                $delivery->company    = Input::post('company');
                $delivery->type_addr  = 0;
                $delivery->city       = Input::post('city');
                $delivery->postcode   = Input::post('postcode');
                $delivery->country_id = 0;
                if (!$delivery->save()) {
                    $flagsave = false;
                }
            } else { //insert delively
                $delivery             = new Model_Mdelivery();
                $delivery->account_id = $userId != null ? $userId : -1;
                $delivery->store_id   = 0;
                $delivery->gender     = 1;
                $delivery->last_name  = Input::post('username');
                $delivery->first_name = Input::post('username');
                $delivery->email      = Input::post('email');
                $delivery->address_1  = Input::post('address');
                $delivery->phone      = Input::post('phone');
                $delivery->company    = Input::post('company');
                $delivery->type_addr  = 0;
                $delivery->city       = Input::post('city');
                $delivery->postcode   = Input::post('postcode');
                $delivery->country_id = 0;

                if (!$delivery->save()) {
                    $flagsave = false;
                }
            }

            if ($flagsave) {
                // var_dump("aaa"); exit();
                Session::set_flash('success', "Mã đơn hàng: " . $orderNew->name . " đã được đặt thành công " . ". Cảm ơn. Chúng tôi sẽ liện hệ với bạn ngay.");
                Session::delete('carts');
                Session::delete('order');
                Session::delete('orderdtl');
                Response::redirect("product/");
            } else {
                Session::set_flash('error', "process failed");
            }
        }

        $this->template->title   = "Depdocla | thanh toán";
        $this->template->content = $view;
    }

    /**
     * Action login
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
//    public function action_login() {
//
//
//        Session::set('login_port', VISITOR_PORT);
//
//        if (Auth::check()) {
//            if (Session::get('login_port') == USER_PORT) {
//                Session::set('login_port', USER_PORT);
//                Response::redirect('account/user/index');
//            } else {
//                Response::redirect('account/user/index');
//            }
//        }
//
////prepare view
//        $view                  = View::forge('delivery/index');
//        $this->template->title = "Depdocla | giao hàng";
//        $view->err             = array();
//
//        if (Input::method() == "POST") {
////exit("login");
//        }
//        $this->template->content = $view;
//    }
}
