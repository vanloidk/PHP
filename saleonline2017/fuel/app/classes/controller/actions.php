<?php

/**
 * /account.php
 *
 * @copyright Copyright (C) X -TRANS inc.
 * @author Dao Anh Minh
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X -TRANS Develop License 1.0
 */

/**
 * Account
 *
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Dao Anh Minh
 * @package tmd
 * @since Nov 6, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
use Auth\Model;

class Controller_actions extends Controller_Base
{

    /**
     * before action
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public function before()
    {
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
     * @author Bui Huu Phuc
     */
    public function action_index()
    {
        $view = View::forge('role/actions/index');

        $permissions = Auth\Model\Auth_Permission::find('all');
        $roles       = Model_accountroles::get_roles(true);
        
        $view->roles             = $roles;
        $view->permissions       = $permissions;
        $this->template->title   = "Action";//__('title.:label_index_title', array('label' => "Sale Online System"));
        $this->template ->content = $view;
    }

    public function action_edit($per_id)
    {

        if (input::method() == 'POST') {

            $str_per_actions      = "";
            $str_per_role_actions = "";
            $arr_permissions      = explode(",", input::post('actions'));

            //create string permission

            $len_permissions = count($arr_permissions);
            $str_per_actions .= "a" . ":" . $len_permissions . ":{";
            $str_per_role_actions .= "a" . ":" . $len_permissions . ":{";

            $i = 0;
            foreach ($arr_permissions as $value) {
                $len_actions = strlen($value);
                // permission
                $str_per_actions.= 'i' . ':' . $i . ';' . 's' . ':' . $len_actions . ':' . '"' . $value . '"' . ';';

                // role_permission
                $str_per_role_actions.= 'i' . ':' . $i . ';' . 'i' . ':' . $i . ';';
                $i++;
            }

            $str_per_actions.= '}';
            $str_per_role_actions.= '}';

            $permission              = Model_accountpermission::find($per_id);
            $role_permission         = Model\Auth_Rolepermission::find(array("perms_id" => $per_id));
            // $role_permission = Model_accountrolepermission::find_by('perms_id', $per_id);
            //insert permission
            $permission->area        = input::post('area');
            $permission->permission  = input::post('permission');
            $permission->description = input::post('description');
            $permission->actions     = $str_per_actions;

            //var_dump($role_permission); exit();
            $permission->user_id      = input::post('user_id');
            // $permission->save();
            // $role_permission->pers_id = input::post('pers_id');
            $role_permission->actions = $str_per_role_actions;


            // $role_permission->save();

            if ($permission->save() && $role_permission->save()) {
                Session::set_flash("update success");
                Response::redirect("/actions/");
            } else {
                Session::set_flash("error save");
            }
            //insert role_permission
        }

        $view                    = View::forge('role/actions/edit');
        $permissions             = Auth\Model\Auth_Permission::find($per_id);
        $view->permissions       = $permissions;
        $this->template->title   = "Edit";//__('title.:label_edit_title', array('label' => __('common.account')));
        $this->template->content = $view;
    }

    public function action_register()
    {
        $view = View::forge('role/actions/register');

        if (Input::method() == 'POST') {
            // var_dump(input::post()); exit();
            $str_per_actions      = "";
            $str_per_role_actions = "";
            $arr_permissions      = explode(",", input::post('actions'));

            //create string permission

            $len_permissions = count($arr_permissions);
            $str_per_actions .= "a" . ":" . $len_permissions . ":{";
            $str_per_role_actions .= "a" . ":" . $len_permissions . ":{";

            $i = 0;
            foreach ($arr_permissions as $value) {
                $len_actions = strlen($value);
                // permission
                $str_per_actions.= 'i' . ':' . $i . ';' . 's' . ':' . $len_actions . ':' . '"' . $value . '"' . ';';

                // role_permission
                $str_per_role_actions.= 'i' . ':' . $i . ';' . 'i' . ':' . $i . ';';
                $i++;
            }

            $str_per_actions.= '}';
            $str_per_role_actions.= '}';

            $permission      = new Model_accountpermission();
            // $role_permission         = Model\Auth_Rolepermission::find("all", array( "perms_id" => $per_id ));
            $role_permission = new Model_accountrolepermission();

            //insert permission
            $permission->area        = input::post('area');
            $permission->permission  = input::post('permission');
            $permission->description = input::post('description');
            $permission->actions     = $str_per_actions;

            $permission->user_id = input::post('user_id');
            //  var_dump($str_per_actions); exit();

            $permission->save();

            $role_permission->role_id  = $this->get_role_id(input::post('area'));
            $role_permission->perms_id = $permission->id;
            $role_permission->id       = $permission->id;
            $role_permission->actions  = $str_per_role_actions;
            // $role_permission->save();

            if ($role_permission->save()) {
                Session::set_flash("insert success");
                Response::redirect("/actions/");
            } else {
                Session::set_flash("error save");
            }
        }

        $this->template->title   = "Register action";
        $this->template->content = $view;
    }

    public function action_delete($perms_id)
    {
        $account_permistions = Model_accountpermission::find($perms_id);
        if (!$account_permistions->delete()) {
            Session::set_flash('error', "error transaction delete");
        } else {
            Session::set_flash('success', "delete  success");
            Response::redirect('/actions/');
        }

        $this->template->title = "Register";//__('title.:label_edit_title', array('label' => __('common.account')));
    }

    /**
     *
     * @param type $user
     * @return int
     */
    public function get_role_id($user)
    {
        $role_id = 0;
        switch ($user) {
            case "admin":
                $role_id = 1;
                break;
            case "sale":
                $role_id = 2;
                break;
            case "user":
                $role_id = 3;
                break;
            case "visitor":
                $role_id = 4;
                break;

            default:
                $role_id = 0;
                break;
        }
        return $role_id;
    }

    public function action_loadactions()
    {
        $user_id = Input::post('user_id');

        if ($user_id == 0) {

            $permissions = Model\Auth_Permission::find('all', array('order_by' => 'area'));
        } else {

            $permissions = Model\Auth_Permission::find('all', array('where'    => array(array('user_id' => $user_id),
                        ),
                        'order_by' => array('area' => 'asc')));
        }

        $tbl_permissions = $this->create_table_actions($permissions);
        return $tbl_permissions;
    }

    public function create_table_actions($permissions)
    {
        $tbl_actions = "";
        foreach ($permissions as $value) {
            $actions = implode(',', $value->actions);
            $tbl_actions .= "        <tr> ";
            $tbl_actions .= "<td> $value->id </td>";
            $tbl_actions .= "<td> $value->area </td>";
            $tbl_actions .= "<td> $value->permission </td>";
            $tbl_actions .="<td> $value->description </td>";
            $tbl_actions .="<td> $actions </td>";
            $tbl_actions .="<td> $value->user_id </td>";
            $tbl_actions .= "<td>";
            $tbl_actions .= "<a href= '/saleonline/html/actions/edit/$value->id' class='btn btn-primary'>";
            $tbl_actions .="                    Edit ";
            $tbl_actions .="                </a> ";

            $tbl_actions .= "<a href= '/saleonline/html/actions/delete/$value->id' class='btn btn-primary'>";
            $tbl_actions .="                    Delete ";
            $tbl_actions .="                </a> ";
            $tbl_actions .="            </td> ";
            $tbl_actions .="        </tr> ";
        }

        return $tbl_actions;
    }

}
