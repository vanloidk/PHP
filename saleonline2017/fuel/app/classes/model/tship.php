<?php

class Model_Tship extends \Orm\Model {

    protected static $_table_name  = 't_ship';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'name',
        'method',
        'from_company',
        'to_company',
        'ship_date',
        'status',
        'total_price',
        'created_date',
        'updated_date',
    );
    protected static $_has_many = array(
        'order_product' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Tproduct',
            'key_to'         => 'ship_id',
            'cascade_update' => false,
            'cascade_delete' => false
        )
    );

    public static function get_shipdtl() {
        $shipdtls = Model_Tship::query()
                ->related('order_product')
                ->get();
        return $shipdtls;
    }

}
