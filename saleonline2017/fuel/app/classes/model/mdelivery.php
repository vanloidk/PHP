<?php

class Model_Mdelivery extends \Orm\Model {

    protected static $_table_name = 'm_delivery';
    protected static $_properties = array(
        'id',
        'account_id',
        'country_id',
        'first_name',
        'last_name',
        'born_date',
        'company',
        'address_1',
        'address_2',
        'phone',
        'district',
        'type_addr',
        'email',
        'city',
        'gender',
        'postcode',
    );
    protected static $_belong_to  = array(
        'account' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_account',
            'key_to'         => 'account_id',
            'cascade_save'   => false,
            'cascade_delete' => false
        ),
        'torder'  => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Torder',
            'key_to'         => 'account_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'tstore'  => array(
            'key_from'       => 'store_id',
            'model_to'       => 'Model_Tstore',
            'key_to'         => 'id',
            'cascade_update' => false,
            'cascade_delete' => false
        )
    );

    /**
     * get_address_by_user_id
     *
     * @param int  $account_id account_id
     * @return array account
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_address_by_user_id($account_id, $type_addr) {
        $delivery = Model_Mdelivery::query()
                ->where('account_id', $account_id)
                ->where('type_addr', $type_addr)
                ->get_one();
        return $delivery;
    }

    /**
     * get_address_by_user_id
     *
     * @param int  $account_id account_id
     * @return array account
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_address_store($account_id) {
        $delivery = Model_Mdelivery::query()
                ->related('tstore')
                ->where('account_id', $account_id)
                ->get_one();
        return $delivery;
    }

    public static function get_delivery_by_account_id($account_id) {
        $delivery = Model_Mdelivery::query()
                ->where('account_id', $account_id)
                ->get_one();
        return $delivery;
    }
}
