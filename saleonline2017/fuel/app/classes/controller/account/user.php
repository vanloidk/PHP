<?php

/**
 * /user.php
 *
 * @copyright 
 * @author Nguen Van Loi
 * @package tmd
 * @since Nov 14, 2014
 * @version $Id$
 * @license 
 */

/**
 * User
 *
 * <pre>
 * </pre>
 *
 * @copyright 
 * @author Nguen Van Loi
 * @package tmd
 * @since Nov 14, 2014
 * @version $Id$
 * @license 
 */
class Controller_Account_user extends Controller_Base {

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
    public function action_login() {

        Session::set('login_port', VISITOR_PORT);

        if (Auth::check()) {
            if (Session::get('login_port') == USER_PORT) {
                Session::set('login_port', USER_PORT);
                Response::redirect('account/user/index');
            } else {
                Response::redirect('account/user/index');
            }
        }

        //prepare view
        $this->template        = View::forge('login_template');
        $this->template->title = "Log in";
        $view                  = View::forge('common/login');
        $view->err             = array();

        if (Input::method() == "POST") {
            //exit("login");
            $val = Model_Account::validate_login();

            if ($val->run()) {

                //get user
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
                        Session::set('login_port', USER_PORT);
                        Response::redirect('sanpham');
                    } else {

                        //var_dump("aaa");
                        Session::set('login_port', VISITOR_PORT);
                        Response::redirect('sanpham');
                        //Session::set_flash('error', "login failed");
                    }
                } else {
                    Session::set_flash('error', "Login failed");
                    $view->err = $val->error_message();
                }
            }
        }
        $this->template->content = $view;
    }

    /**
     * Action index
     *
     * @return void
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Loi
     */
    public function action_index() {

        $total_items = Model_Tproduct::countProductsPagination(2);

        $config     = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/account/user/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );
        $pagination = Fuel\Core\Pagination::forge('account/user/', $config);

        $view     = View::forge('account/user/index');
        //$tproduct = Model_Tproduct::find('all');
        $tproduct = Model_Tproduct::getProductsPagination($pagination, 2);

        $view->tproduct = $tproduct;

        $view->pagination             = $pagination;
        $this->template->title        = "Depdocla shop";
        $this->template->number_carts = count(Session::get('carts'));
        $this->template->content      = $view;
    }

    public function action_register() {

        $view      = View::forge('account/user/register');
        $view->err = array();

        if (input::method() == "POST") {
            $val = Model_Account::validate_change_profield();

            //save account
            if ($val->run()) {
                $save                = true;
                $account             = Model_Account::forge();
                $account->username   = Input::post('username');
                $account->email      = Input::post('email');
                $account->password   = Auth::hash_password(Input::post('passwd'));
                $account->lang       = "vn";
                $account->first_name = Input::post('deliveryName');
                $account->last_name  = "vloi";
                $account->lock       = 0;
                $account->user_id    = 1;

                $account->created_at = date('Y/m/d');
                $account->updated_at = date('Y/m/d');

                if (!$account->save()) {
                    $save = false;
                }

                $delivery = new Model_Mdelivery();

                $delivery->account_id = $account->id;
                $delivery->store_id   = 1;
                $delivery->first_name = Input::post('deliveryName');
                $delivery->last_name  = "";
                $delivery->company    = Input::post('company');
                $delivery->address_1  = Input::post('address');
                $delivery->type_addr  = 1;
                $delivery->city       = Input::post('city');
                $delivery->postcode   = "+084";
                $delivery->country    = "vn";
                $delivery->phone      = Input::post('phone');
                var_dump(Input::post('date_born')); exit();
                $delivery->date_born  = date('Y-m-d', strtotime(Input::post('birthday')));
                $delivery->gender     = 1;
                //save delivery
                if (!$delivery->save()) {
                    $save = false;
                }

                //insert account_metadata
//                $metaData               = Auth\Model\Auth_Metadata();
//                $metaData->parent_id    = $account->id;
//                $metaData->key          = "type_user";
//                $metaData->value        = 1;
//                $metaData->user_id      = $account->user_id;
//                $metaData->created_date = date('Y-m-d');
//                $metaData->updated_date = date('Y-m-d');
//                $metaData->save();
                //accout user role
                $accountRoles          = new Model_accountroles();
                $accountRoles->user_id = $account->id;
                $accountRoles->role_id = USER;

                if (!$accountRoles->save()) {
                    $save = false;
                }

                if ($save) {
                    Session::set_flash('success', "Đăng ký thành viên thành công");
                } else {
                    Session::set_flash('error', "Đăng ký thành viên không thành công");
                }
            } else {
                Session::set_flash('error', "Đăng ký thành viên không thành công");
                $view->err = $val->error_message();
            }
        }

        $view->city              = $this->getCity();
        $this->template->title   = "Dang ký thành viên";
        $this->template->content = $view;
    }

    /**
     * Edit products
     *
     * @param int $id product
     *
     * @access public
     * @author Nguyen Van Loi
     * @version 1.0
     */
    public function action_search() {

        $total_items = Model_Tproduct::countProductsByName(Input::post('txt_search'), 2);

        $config = array(
            'name'           => 'bootstrap3',
            'show_first'     => true,
            'show_last'      => true,
            'first-marker'   => 'First',
            'last-marker'    => 'Last',
            'pagination_url' => 'http://localhost:8080/saleonline/html/products/shoe/',
            'total_items'    => $total_items,
            'per_page'       => PER_PAGE,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = Pagination::forge('products/shoe/index/', $config);
        $product    = Model_Tproduct::getProductsByName($pagination, Input::post('txt_search'), 2);

        $view = View::forge('products/shoe/index');

        $view->tproduct          = $product;
        $view->pagination        = $pagination;
        $this->template->title   = "Depdocla shop";
        $this->template->content = $view;
    }

    public function action_edit() {

        $view      = View::forge('account/user/edit');
        $view->err = array();

        $userId = Auth::get("id");

        if (input::method() == "POST") {

            $val = Model_Account::validate_change_profield();
            if ($val->run()) {
                //save account
                $account           = Model_Account::getAccountById($userId);
                $account->username = Input::post('username');
                $account->email    = Input::post('email');
                $account->password = Auth::hash_password(Input::post('passwd'));
                $account->save();

                //save delivery
                foreach ($account->delivery as $value) {
                    $value->first_name = Input::post('deliveryName');
                    $value->gender     = Input::post('gender');
                    $value->born_date  = Input::post('birthday');
                    $value->company    = Input::post('company');
                    $value->phone      = Input::post('phone');
                    $value->address_1  = Input::post('address');
                    $value->save();
                    //$value->city = Input::post('city');
                    // $value->district = Input::post('district');
                }

                Session::set_flash('success', "Thay đổi thông tin cá nhân thành công"); //__('message.password_changed'));
                Response::redirect('account/user/edit');
            } else {
                Session::set_flash('error', "Thay đổi thông tin không thành công"); //__('message.password_changed'));
                $view->err = $val->error_message();
            }
        }

        //account info
        $accountInfo             = Model_Account::getAccountById($userId);
        $view->city              = $this->getCity();
        $view->account           = $accountInfo;
        $this->template->title   = "Thông tin thành viên";
        $this->template->content = $view;
    }

}
