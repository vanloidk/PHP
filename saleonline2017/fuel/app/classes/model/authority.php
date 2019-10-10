<?php

class Model_Authority extends \Orm\Model
{

    protected static $_table_name  = 'account_user_roles';
    protected static $_primary_key = array('user_id', 'role_id');
    protected static $_properties = array(
        'user_id',
        'role_id',
    );
    protected static $_belongs_to = array(
        'account' => array(
            'key_from'       => 'user_id',
            'model_to'       => 'Model_Account',
            'key_to'         => 'id',
            'cascade_save'   => false,
            'cascade_delete' => false,
        )
    );

    /**
     * get Authority
     *
     * @param string $account_id account id
     * @return array authority of an account
     *
     * @access public
     * @author Bui Huu Phuc
     */
    public static function get_authority($account_id)
    {
        $authorities = Model_Authority::query()->where('user_id', $account_id)->get();
        $ret         = array();
        foreach ($authorities as $au) {
            $ret[] = $au->role_id;
        }
        return $ret;
    }

    /**
     * Check if user has admin authority
     *
     * @param string $account_id account id
     * @return boolean true | false
     *
     * @access public
     * @author Nguyen Van hiep
     */
    public static function check_admin_auth($account_id)
    {
        $auth = Model_Authority::get_authority($account_id);
        return in_array(MANAGER_AUTHORITY, $auth);
    }

    /**
     * get list account follow role
     *
     * @param int $role_id role_id
     * @return object $querys  account
     *
     * @author Nguyen Van Loi
     */
    public static function get_account($role_id)
    {
        $querys = Model_Authority::query()
                ->related("account")
                ->where('t1.lock', false)
                ->where('role_id', $role_id)
                ->order_by(array('account.last_name' => 'asc', 'account.first_name' => 'asc'))
                ->get();
        return $querys;
    }

    /**
     * Get Account No Having Approval route
     *
     * @param  int $role_id role_id
     * @param  int $request_id request_id
     * @return array $querys mstrequestapprovalroute
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_account_not_approvalroute($role_id, $request_id)
    {
        $subQuery = Model_Mstrequestapprovalroute::query()
                ->select('account_id')
                ->where('request_id', '=', $request_id);
        $querys   = Model_Authority::query()
                ->related("account")
                ->where('account.lock', false)
                ->where('role_id', $role_id)
                ->where('user_id', 'not in', $subQuery->get_query(true))
                ->order_by(array('account.last_name' => 'asc', 'account.first_name' => 'asc'))
                ->get();
        return $querys;
    }

    /**
     * Get account roles
     *
     * @param  int $role_id role_id
     * @return array $querys userroles
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_accountuserroles_by_array_id($role_id, $arr_id)
    {
        $querys = Model_Authority::query()
                ->related("account")
                ->where('role_id', $role_id)
                ->where('t1.lock', false);
        if ($arr_id != null) {
            $querys->where('user_id', 'not in', $arr_id);
        }
        return $querys->get();
    }

    /**
     * Get Account route
     *
     * @param  int $role_id role_id
     * @return array $querys mstrequestapprovalroute
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_accountroute_by_array_id($role_id, $arr_id)
    {
        $res                   = null;
        $requestapprovalroutes = array();
        $querys                = Model_Authority::query()
                ->related("account")
                ->where('role_id', $role_id)
                ->where('t1.lock', false);
        if ($arr_id != null) {
            $querys->where('user_id', 'in', $arr_id);
            $res = $querys->get();
        }
        //sort array
        for ($i = 0; $i < count($arr_id); $i++) {
            foreach ($res as $value) {
                if ($arr_id[$i] == $value->user_id) {
                    array_push($requestapprovalroutes, $value);
                }
            }
        }
        return $requestapprovalroutes;
    }

}
