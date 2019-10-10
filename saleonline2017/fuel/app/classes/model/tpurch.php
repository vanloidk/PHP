<?php
class Model_Tpurch extends \Orm\Model {

    protected static $_table_name  = 't_purch';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'name',
        'purch_date',
        'method',
        'status',
        'total_price',
        'company',
       // 'updated_date',
    );
//    protected static $_has_many = array(
//        'order_product' => array(
//            'key_from'       => 'id',
//            'model_to'       => 'Model_Tproduct',
//            'key_to'         => 'ship_id',
//            'cascade_update' => false,
//            'cascade_delete' => false
//        )
//    );

//    public static function get_shipdtl() {
//        $shipdtls = Model_Tship::query()
//                ->related('order_product')
//                ->get();
//        return $shipdtls;
//    }

}
