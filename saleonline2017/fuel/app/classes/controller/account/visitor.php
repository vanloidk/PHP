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
class Controller_Account_Visitor extends Controller_Base {

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
            if (Session::get('login_port') == VISITOR_PORT) {
                Session::set('login_port', VISITOR_PORT);
                Response::redirect('account/visitor/index');
            } else {
                Response::redirect('account/visitor/index');
            }
        }

        //prepare view
        $this->template        = View::forge('login_template');
        $this->template->title = "Log in";
        $view                  = View::forge('common/login');
        $view->err             = array();

        if (Input::method() == "POST") {
            //   exit("login");
            $val = Model_Account::validate_login();

            //get user
            $accountLock = Model_Account::query()
                    ->select('id')
                    ->where('username', Input::post('account'))
                    ->where('lock', false)
                    ->get_one();
            //check exist role in user
            //  $account     = Model_Account::getUserByUserName(Input::post("account"));
            // $accoutnIds  = Model_accountroles::check_account_role($account->id, USER);

            if ($accountLock) {
                Session::set('login_port', VISITOR_PORT);
                Session::set('login_port', USER_PORT);
            } else {
                Session::set_flash('error', "Login failed");
                $view->err = $val->error_message();
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
        $view = View::forge('products/index');

        //dong ho  1
        $clocks      = Model_Tproduct::getProductsByCategoryID(1);
        //nhan 2
        $rings       = Model_Tproduct::getProductsByCategoryID(2);
        //day chuyen 3
        $necklaces   = Model_Tproduct::getProductsByCategoryID(3);
        //lactay lacchan 4
        $bangles     = Model_Tproduct::getProductsByCategoryID(4);
        //hopdungtrangsu 5
        $jewelry_box = Model_Tproduct::getProductsByCategoryID(5);
        //bong tai 6
        $earrings    = Model_Tproduct::getProductsByCategoryID(6);

        $view->clocks      = $clocks;
        $view->rings       = $rings;
        $view->necklaces   = $necklaces;
        $view->bangles     = $bangles;
        $view->jewelry_box = $jewelry_box;
        $view->earrings    = $earrings;

        $this->template->title   = "Trang chủ";
        $this->template->content = $view;
    }

    public function action_register() {

        $view                    = View::forge('account/user/register');
        $this->template->title   = "Register Account";
        $this->template->content = $view;
    }

}
