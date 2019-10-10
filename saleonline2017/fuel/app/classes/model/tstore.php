<?php

class Model_Tstore extends \Orm\Model
{

    protected static $_table_name  = 't_store';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'name',
        'url',
        'ssl',
    );
    protected static $_has_many    = array(
        'tdelivery' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Mdelivery',
            'key_to'         => 'store_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
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
    public static function get_address_store($account_id)
    {

        $delivery = Model_Tstore::query()
                ->related('tdelivery')
                ->where('tdelivery.account_id', $account_id)
                ->get_one();
        return $delivery;
    }

}
