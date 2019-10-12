<?php

class Model_Account extends \Orm\Model {

    protected static $_table_name = 'account';
    protected static $_properties = array(
        'id',
        'username',
        'password',
        'first_name',
        'last_name',
        //'first_kana',
        //'last_kana',
        'user_id',
        'lang',
        'lock',
        'email',
        'created_at',
        'updated_at',
    );

    /**
     * relation mstrequestapprovalroute table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Loi
     */
    protected static $_has_many = array(
        'torder'   => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Torder',
            'key_to'         => 'account_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'delivery' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Mdelivery',
            'key_to'         => 'account_id',
            'cascade_update' => false,
            'cascade_delete' => true
        ),
        'metadata' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model\\Auth_Metadata',
            'key_to'         => 'parent_id',
            'cascade_delete' => true,
        ),
    );

    /**
     * Create validation object
     *
     * @param string $action action (create|edit)
     * @param int $id object id
     * @return object return a validation object
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function validate($action = null, $id = null) {
        $val = Validation::forge($action);

        //if register new user or edit normal user => validate user name
        if ($action != 'edit' || $id != ADMIN_USER_ID) {
            $val->add('account', __('account.account_id'))
                    ->add_rule('required')
                    ->add_rule('min_length', 2)
                    ->add_rule('max_length', 64)
                    ->add_rule('username')
                    ->add_rule('username_unique', $id);
        }

        $val->add('passwd', __('account.password'))
                ->add_rule('min_length', 8)
                ->add_rule('max_length', 64)
                ->add_rule('password');

        //if create user -> require password
        if ($action == 'create') {
            $val->field('passwd')->add_rule('required');
        }

        $val->add('first_name', __('account.first_name'))
                ->add_rule('required')
                ->add_rule('min_length', 1)
                ->add_rule('max_length', 64);
        $val->add('last_name', __('account.last_name'))
                ->add_rule('required')
                ->add_rule('min_length', 1)
                ->add_rule('max_length', 64);
//        $val->add('first_kana', __('account.first_kana'))
//                ->add_rule('min_length', 1)
//                ->add_rule('max_length', 64);
//        $val->add('last_kana', __('account.last_kana'))
//                ->add_rule('min_length', 1)
//                ->add_rule('max_length', 64);
        $val->add('lang', __('account.lang'))
                ->add_rule('required');

        //if admin -> does not validate authority
        if ($id != ADMIN_USER_ID) {
            $val->add('authority', __('account.role'))
                    ->add_rule('auth_selection');
        }

        $val->add('primary_group', __('account.primary_group'))
                ->add_rule('primary_group');

        return $val;
    }

    /**
     * Create change password validation object
     *
     * @return object return a validation object
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function validate_change_password() {

        $val = Validation::forge();
        $val->add('old_password', __('account.old_password'))
                ->add_rule('required')
                ->add_rule('old_password');
        $val->add('new_password', __('account.new_password'))
                ->add_rule('required')
                ->add_rule('min_length', 5)
                ->add_rule('max_length', 64)
                ->add_rule('new_password');
               // ->add_rule('password');
        $val->add('confirm_password', __('account.confirm_password'))
                ->add_rule('required')
                ->add_rule('min_length', 5)
                ->add_rule('max_length', 64)
               // ->add_rule('password')
                ->add_rule('confirm_password');
        return $val;
    }

    /**
     * Create change password validation object
     *
     * @return object return a validation object
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function validate_change_profield() {

        $val = Validation::forge();
        $val->add('username', __('account.username'))
                ->add_rule('required')
                ->add_rule('min_length', 5)
                ->add_rule('max_length', 255);

        $val->add('email', __('account.email'))
                ->add_rule('required')
                ->add_rule('trim')
                ->add_rule('valid_email');
        return $val;
    }

    /**
     * Create change password validation object
     *
     * @return object return a validation object
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function validate_login() {
        $val = Validation::forge();
        $val->add('account', __('account.account_id'))->add_rule('required');
        $val->add('passwd', __('account.password'))->add_rule('required');
        return $val;
    }

    /**
     * Get user from ID
     *
     * @param integer $user_id user ID
     * @return array account
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function get_user_by_id($user_id) {
        $user = Model_Account::query()
                ->where('id', $user_id)
                ->where('lock', false)
                ->get_one();
        return $user;
    }

    /**
     * Get all language
     *
     * @return return
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public static function get_all_language() {
        $countries = parse_ini_file(USER_CONFIG_PATH . '/country_language.ini', true);
        $ret       = array();
        foreach ($countries as $key => $country) {
            $ret[$key] = $country['language_name'];
        }
        return $ret;
    }

    /**
     * get Primary group
     *
     * @return primary group name
     *
     * @access public
     * @author Nguyen Van Loi
     *
     */
    public function get_primary_group() {
        //get primary group id
        $primary_group = Model_Group::query()
                ->where('account_id', $this->id)
                ->where('primary_group', true)
                ->get_one();

        if (empty($primary_group)) {
            $this->primary_group_name = '';
            return;
        }

        //get primary group name
        $group_info = Model_Mstgroup::query()
                ->where('id', $primary_group->group_id)
                ->get_one();

        $this->primary_group_name = $group_info->group_name;
    }

    /**
     * get Authority name
     *
     * @return authority name (Comma-separated)
     *
     * @access public
     * @author Nguyen Van Loi
     *
     */
    public function get_authority() {
        //get authority id
        $authorities = Model_Authority::get_authority($this->id);
        $ret         = array();
        foreach ($authorities as $au) {
            $role  = Model_Role::find($au);
            $ret[] = __('account.' . $role->name);
        }

        $this->authority_name = implode(', ', $ret);
    }

    /**
     * get account of request approval route
     *
     * @param int $request_id request_type id
     *
     * @return array account
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_all_permission_by_user($user_id) {
        $permissions = \Auth\Model\Auth_Permission::query()->where('user_id', $user_id)
                ->get();
        return $permissions;
    }

    public static function get_roles($flag = null) {

        $roles = Model\Auth_Role::query()->select('*')
                ->get();

        //convert to array
        $role_rs = array();
        foreach ($roles as $key => $obj) {
            //$groups[$key] = $obj->to_array();
            if ($flag) {
                $role_rs[0] = "all";
                $flag       = false;
            } else {
                $role_rs[$key] = $obj->name;
            }
        }
        return $role_rs;
    }

    public static function getOrder() {
        $orders = Model_Account::query()
                ->select('*')
                ->related('torder')
                ->get();
        return $orders;
    }

//    public static function getAccount($pagination, $account_id, $accout_name, $lock) {
//
//        $query = Model_Account::query()
//                ->related('delivery');
//        if ($account_id != null) {
//            $query->where('delivery.account_id', $account_id);
//        }
//        if ($accout_name != null) {
//            $query->where('delivery.first_name', $accout_name);
//        }
//
//        if ($lock != null) {
//            $query->where('lock', $lock);
//        }
//        $query->rows_offset($pagination->offset);
//        $query->rows_limit($pagination->per_page);
//        return $query->get();
//    }

    public static function getUserByUserName($userName) {
        $user = Model_Account::query()->where('username', $userName)
                ->get_one();
        return $user != null ? $user : new Model_Account();
    }

    public static function getAccount($pagination, $account_id, $accout_name, $lock) {

        $query = Model_Account::query()
                ->related('delivery');
        //   ->related('metadata');
        // ->where('metadata.key', 'type_user');
        //->where('metadata.value', 1);
        if ($account_id != null) {
            $query->where('delivery.account_id', $account_id);
        }
        if ($accout_name != null) {
            $query->where('delivery.first_name', $accout_name);
        }

        if ($lock != null) {
            $query->where('lock', $lock);
        }
        $query->rows_offset($pagination->offset);
        $query->rows_limit($pagination->per_page);
        $query->order_by('username');
        return $query->get();
    }

    public static function getAccountById($account_id) {

        $query = Model_Account::query()
                ->related('delivery')
                ->where('id', $account_id);

        return $query->get_one();
    }
    
    

}
