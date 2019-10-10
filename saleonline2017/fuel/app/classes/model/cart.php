<?php

class Model_Cart extends \Orm\Model
{

    protected static $_table_name  = 'cart';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'user_id',
        'product_id',
        'total_items',
        'total_qty',
        'price',
        'total_price',
        'buy_date',
    );

    /**
     * relation to Counter table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Hiep
     */
    protected static $_has_one = array(
        'counter' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Counter',
            'key_to'         => 'account_id',
            'cascade_save'   => false,
            'cascade_delete' => false
        )
    );

    /**
     * relation mstrequestapprovalroute table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Loi
     */
    protected static $_has_many = array(
        'request_approval_route' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Mstrequestapprovalroute',
            'key_to'         => 'request_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'request'                => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Request',
            'key_to'         => 'account_id',
            'cascade_update' => false,
            'cascade_delete' => false
        )
    );

}
