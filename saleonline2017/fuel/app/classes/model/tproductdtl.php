<?php

class Model_Tproductdtl extends \Orm\Model {

    protected static $_table_name  = 't_product_dtl';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'product_id',
        'name',
        'model',
        'img',
        'price',
        'created_date',
        'updated_date',
    );

    /**
     * relation mstrequestapprovalroute table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Loi
     */
//        protected static $_has_many = array(
//            'order_product' => array(
//                'key_from'       => 'id',
//                'model_to'       => 'Model_Torderproducts',
//                'key_to'         => 'product_id',
//                'cascade_update' => false,
//                'cascade_delete' => false
//            ),
//        );
}
