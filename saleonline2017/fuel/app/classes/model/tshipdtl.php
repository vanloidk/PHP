<?php

class Model_TshipDtl extends \Orm\Model {

    protected static $_table_name  = 't_ship_dtl';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'product_name',
        'ship_id',
        'price',
        'quantity',
        'inventory'
    );

    /**
     * Get user from ID
     *
     * @param integer $user_id user ID
     * @return array account
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Loi
     */
    public static function get_all_shipdtl() {
        $shipdtls = Model_TshipDtl::query()
                ->where('ship_id', "0")
                ->get();
        return $shipdtls;
    }
    
    public static function get_min_id_shipdtl() {
        $shipIdMin = Model_TshipDtl::query()
                ->where('ship_id', "0")
                ->min('id');
        return $shipIdMin;
    }
    
     public static function get_shipdtl_by_shipid($shipid) {
        $shipdtls = Model_TshipDtl::query()
                ->where('ship_id', $shipid)
                ->get();
        return $shipdtls;
    }

}
