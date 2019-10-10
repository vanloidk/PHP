<?php

class Model_Torderdtl extends \Orm\Model
{

        protected static $_table_name  = 't_order_dtl';
        protected static $_primary_key = array(
            'id'
        );
        protected static $_properties  = array(
            'id',
            'order_id',
            'product_id',
            'name',
            'model',
            'quantity',
            'price',
            'total',
            'tax',
            'created_date',
            'updated_date',
        );

}
