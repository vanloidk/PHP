<?php

class Model_Torderproduct extends \Orm\Model
{

    protected static $_table_name  = 't_order_product';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'product_id',
        'order_id',
    );
    protected static $_belong_to   = array(
        'tproduct' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Tproduct',
            'key_to'         => 'product_id',
            'cascade_save'   => false,
            'cascade_delete' => false
        ),
        'torder'   => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Order',
            'key_to'         => 'order_id',
            'cascade_update' => false,
            'cascade_delete' => false
        )
    );

}
