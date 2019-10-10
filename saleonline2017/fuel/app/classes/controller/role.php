<?php

use Auth\Model\Auth_Role;

class Controller_Role extends Controller_Base {

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
        $view                    = View::forge('role/index');
        $roles                   = Auth_Role::find('all');
        $view->roles             = $roles;
        $this->template->title   = "Role"; // __('title.:label_index_title', array('label' => "Sale Online System"));
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
        $view = View::forge('role/register');
        if (Input::method() == 'POST') {
            $roleEntity          = new Auth\Model\Auth_Role();
            $roleEntity->name    = Input::post('name');
            $roleEntity->filter  = Input::post('filter');
            $roleEntity->user_id = Input::post('user_id');
            if (!$roleEntity->save()) {
                Session::set_flash('error', "error transaction");
            } else {
                Session::set_flash('success', "insert  success");
                Fuel\Core\Response::redirect('/role/');
            }
        }
        $this->template->title   = "Register Role";
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
     * @author Nguyen Van Loi
     */
    public function action_edit($id) {

        $view  = View::forge('role/edit');
        $roles = Auth_Role::find($id);
        if (Input::method() == 'POST') {

            $roles->name    = Input::post('name');
            $roles->filter  = Input::post('filter');
            $roles->user_id = Input::post('user_id');
            if ($roles->save()) {
                Session::set_flash('success', "Update  success");
                Fuel\Core\Response::redirect('/role/');
            } else {
                 Session::set_flash('error', "Update  errors");
            }
        } 

        $view->roles             = $roles;
        $this->template->title   = "Edit";
        $this->template->content = $view;
    }

    public function action_new() {
        $view = View::forge('role/new');
        if (Input::method() == 'POST') {
            $roleEntity          = new Auth\Model\Auth_Role();
            $roleEntity->name    = Input::post('name');
            $roleEntity->filter  = Input::post('filter');
            $roleEntity->user_id = Input::post('user_id');
            if (!$roleEntity->save()) {
                Session::set_flash('error', "error transaction");
            } else {
                Session::set_flash('success', "insert  success");
                Fuel\Core\Response::redirect('/role/');
            }
        }
        $this->template->title   = "Register Role";
        $this->template->content = $view;
    }

    public function action_delete($role_id) {
        $roleEntity = Auth\Model\Auth_Role::find($role_id);
        if (!$roleEntity->delete()) {
            Session::set_flash('error', "error transaction delete");
        } else {
            Session::set_flash('success', "delete  success");
            Response::redirect('/role/');
        }

        $this->template->title = "Edit";
    }

}
