<?php

use Auth\Model\Auth_User;

class Controller_Group extends Controller_Base
{

    /**
     * Show data index
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_index()
    {
        $view                    = View::forge('group/index');
        $groups                  = Model_Group::find('all');
        $view->groups            = $groups;
        $this->template->title   = "Group";
        $this->template->content = $view;
    }

    public function action_register()
    {
        $view = View::forge('group/register');

        if (Input::method() == 'POST') {
            $groupEntity          = new Auth\Model\Auth_Group();
            $groupEntity->name    = Input::post('name');
            $groupEntity->user_id = Input::post('user_id');
            if (!$groupEntity->save()) {
                Session::set_flash('error', "error transaction");
            } else {
                Session::set_flash('success', "insert  success");
                Fuel\Core\Response::redirect('/group/');
            }
        }

        $roles                   = Auth::roles();
        $view->roles             = $roles;
        $this->template->title   = "Group Register";
        $this->template->content = $view;
    }

    /**
     * delete group
     *
     * @param type $group_id
     */
    public function action_delete($group_id)
    {
        $groupEntity = Auth\Model\Auth_Group::find($group_id);
        if (!$groupEntity->delete()) {
            Session::set_flash('error', "error transaction delete");
        } else {
            Session::set_flash('success', "delete  success");
            Response::redirect('/group/');
        }

        $this->template->title = __('title.:label_edit_title', array('label' => __('common.shift')));
    }

    /**
     * Edit Shift
     *
     * @param Int $id Id of Model_Mstshiftworktime
     * @return void
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_edit($group_id = null)
    {
        $view        = View::forge('group/edit');
        $view->group = Auth\Model\Auth_Group::find($group_id);

        if (Input::method() == "POST") {
            // var_dump( Input::post('user_id')); exit();
            $groupEntity          = Auth\Model\Auth_Group::find($group_id);
            $groupEntity->name    = Input::post('name');
            $groupEntity->user_id = Input::post('user_id');

            if (!$groupEntity->save()) {
                Session::set_flash('error', "error transaction update");
            } else {
                Session::set_flash('success', "update  success");
                Response::redirect('/group/index/');
            }
        }


        $roles                   = Auth::roles();
        $view->roles             = $roles;
        $this->template->title   = "Group edit";//__('title.:label_edit_title', array('label' => __('common.shift')));
        $this->template->content = $view;
    }

    /**
     * Show data index
     *
     * @access public
     * @version 1.0
     * @since 1.0
     * @author Nguyen Van Loi
     */
    public function action_accountlist($group_id)
    {
        $view                    = View::forge('group/accountlist');
        $account_list            = \Auth\Model\Auth_User::find(array('group' => $group_id));
        $view->account_list      = $account_list;
        $this->template->title   = __('title.:label_index_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

}
