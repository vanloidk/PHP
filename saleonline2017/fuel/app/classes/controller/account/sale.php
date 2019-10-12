<?php

/**
 * /approver.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 20, 2014
 * @version $Id$
 * @license 
 */

/**
 * approver
 *
 * <pre>
 * </pre>
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package saleonline
 * @since Nov 20, 2014
 * @version $Id$
 * @license 
 */
class Controller_Account_Sale extends Controller_Base {

    public function before() {
        parent::before();
    }

    public function action_index() {
        $view                    = View::forge('account/sale/index');
        $this->template->title   = "Sale system";
        $this->template->content = $view;
    }

    public function action_login() {

        Session::set('login_port', VISITOR_PORT);
        // if logged in -> go to home page corresponding with authority of user
        if (Auth::check()) {
            if (Session::get('login_port') == ADMIN_PORT) {
                Response::redirect('/sale/index');
            } else {
                Response::redirect('/user/index');
            }
        }
        //prepare view
        $this->template        = View::forge('login_template');
        $this->template->title = __('title.approver_login_title');

        $view      = View::forge('common/login');
        $view->err = array();
        if (Input::method() == "POST") {
            $val = Model_Account::validate_login();
            if ($val->run()) {
                //check exist role in user
                $account    = Model_Account::getUserByUserName(Input::post("account"));
                $accoutnIds = Model_accountroles::check_account_role($account->id, SALE);

                if ($accoutnIds) {
                    if (Auth::login()) {
                        Session::set('login_port', SALE_PORT);
                        Response::redirect('account/sale/index');
                    }
                } else {
                    Session::set_flash('error', "login failed");
                }
            }
        }
        $this->template->content = $view;
    }

}
