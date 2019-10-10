<?php

/**
 * /approver.php
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package saleonline
 * @since Nov 20, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */

/**
 * approver
 *
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package saleonline
 * @since Nov 20, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
use Auth\Model\Auth_User;

class Controller_Account_admin extends Controller_Base {

    public function before() {
        parent::before();
        $this->addJs('admin.js');
    }

    /**
     * Index: show the main screen of statistic data
     *
     * @return void
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Loi
     */
    public function action_index() {

        $view                    = View::forge('account/admin/index');
        $accounts                = Auth_User::find("all");
        $groups                  = Model_Group::get_group(true);
        $view->groups            = $groups;
        $view->lstaccount        = $accounts;
        $this->template->title   = "Saleonline";
        $this->template->content = $view;
    }

    public function action_login() {

        Session::set('login_port', VISITOR_PORT);
        // if logged in -> go to home page corresponding with authority of user
        if (Auth::check()) {
            if (Session::get('login_port') == ADMIN_PORT) {
                Response::redirect('account/admin/index');
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
                $accoutnIds = Model_accountroles::check_account_role($account->id, ADMIN);
                if ($accoutnIds) { //If not roles in user
                    if (Auth::login()) {
                        Session::set('login_port', ADMIN_PORT);
                        Response::redirect('account/admin/index');
                    }
                } else {
                    Session::set_flash('error', "Login failed");
                }
            }
        }
        $this->template->content = $view;
    }

    public function action_edit($id) {

        $view = View::forge('account/admin/edit');


        //$userId = Auth::get("id");
        $roleM = new Model_accountroles();
        $roles = $roleM->get_role_by_user($id);

        var_dump($roles);
        exit();

//        echo "<pre>";
//        var_dump($roles);
//        echo "</pre>";
//        exit();
        $account                 = Auth_User::find($id);
        $groups                  = Auth::group()->groups();
        //  $roles                   = Auth::roles();
        $view->account           = $account;
        $view->groups            = $groups;
        $view->roles             = $roles;
        $this->template->title   = "Edit";
        $this->template->content = $view;
    }

    public function roleNumber($strRole) {
        $role = 1;
        switch ($strRole) {
            case "admin":
                $role = 1;
                break;
            case "sale":
                $role = 2;
                break;
            case "user":
                $role = 3;
                break;
            default :
                $role = 1;
                break;
        }
        return $role;
    }

    public function action_new() {

        $view   = View::forge('account/admin/new');
        $groups = Auth::group()->groups();
        $roles  = \Auth\Model\Auth_Role::find('all');

        if (Input::method() == "POST") {

            $user                 = new Auth_User();
            $user->username       = Input::post('user_name');
            $user->first_name     = Input::post('first_name');
            $user->last_name      = Input::post('last_name');
            $user->email          = Input::post('email');
            $user->password       = Input::post('passwd');
            $user->last_login     = 0;
            $user->previous_login = 0;
            $user->login_hash     = 0;
            $user->lock           = 0;

            $user->lang = "vn";

            if ($user->save()) {
                //insert roles for user
                if (!empty(Input::post('roles'))) {
                    $rolseP = Input::post('roles');
                    foreach ($rolseP as $role) {
                        $userRoles          = new Model_accountroles();
                        $userRoles->role_id = $this->roleNumber($role);
                        $userRoles->user_id = $user->id;
                        $userRoles->save();
                    }
                }

                Session::set_flash('success', "Insert succeed");
                Response::redirect('account/admin');
            } else {
                Session::set_flash('error', "Insert failed");
            }
        }

        $view->groups            = $groups;
        $view->roles             = $roles;
        $this->template->title   = "New";
        $this->template->content = $view;
    }

    public function action_delete() {
        $order = Auth_User::find(input::post('userId'));
        $order->delete();
    }

    public function action_searchgroup() {
        $group_id = Input::post('group_id');

        if ($group_id == 0) {
            $accounts = Auth_User::find('all', array('order_by' => 'username'));
        } else {
            $accounts = Auth_User::find('all', array('where'    => array('group_id' => $group_id),
                        'order_by' => array('username' => 'asc')));
        }
        $table_listaccount = $this->create_table_listuser($accounts);
        return $table_listaccount;
    }

    public function create_table_listuser($lstaccount) {
        $table_listuser = "";
        foreach ($lstaccount as $value) {
            $table_listuser .= "        <tr> ";
            $table_listuser .= "<td> $value->id </td>";
            $table_listuser .= "<td> $value->username </td>";
            $table_listuser .= "<td> $value->first_name </td>";
            $table_listuser .="<td> $value->last_name </td>";
            $table_listuser .="<td> $value->lock </td>";
            $table_listuser .= "<td>";
            $table_listuser .= "<a href= '/saleonline/html/account/admin/edit/$value->id' class='btn btn-primary'>";
            $table_listuser .="                    Edit ";
            $table_listuser .="                </a> ";
            $table_listuser .="            </td> ";
            $table_listuser .="        </tr> ";
        }

        return $table_listuser;
    }

}
