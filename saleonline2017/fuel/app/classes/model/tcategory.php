<?php

class Model_Tcategory extends \Orm\Model {

    protected static $_table_name  = 't_category';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'name',
        'parent_id',
        'status',
        'top',
        //'colunm',
        'sort_order',
        'image',
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
    protected static $_has_many = array(
        'tproduct' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Tproduct',
            'key_to'         => 'category_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
    );

    /**
     * get object product.
     *
     * @param string $product product_id
     * @return product
     */
    public static function get_product_by_category($product) {
        $latops = Model_Tcategory::query()
                ->related('tproduct')
                ->where('name', $product)
                ->get();

        return $latops;
    }

    /**
     * get category by name
     *
     * @param string $product product_id
     * @return product
     */
    public static function get_categoryName() {

        $category = Model_Tcategory::find('all', array('order_by' => 'name'));

//        $categoryNames = array();
//        foreach ($category as $key => $value) {
//            $categoryNames[] = $value->name;
//        }
        return $category; //$categoryNames;
    }

}
