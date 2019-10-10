<?php

class Model_Tpurchdtl extends \Orm\Model {

    protected static $_table_name  = 't_purch_dtl';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'product_name',
        'purch_id',
        'price',
        'quantity',
    );

    public static function get_all_purchdtl() {
        
        $purchdtls = Model_Tpurchdtl::query()
                ->where('purch_id', "0")
                ->get();
        
        return $purchdtls;
    }
    public static function get_min_id_purchdtl() {
        
        $purchMinId = Model_Tpurchdtl::query()
                ->where('purch_id', "0")
                ->min('id');
        
        return $purchMinId;
    }
    
    public static function get_purchdtl_by_purchid($purchid) {
        $purchdtls = Model_Tpurchdtl::query()
                ->where('purch_id', $purchid)
                ->get();
        return $purchdtls;
    }
}
