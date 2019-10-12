<?php

class Model_Tproduct extends \Orm\Model {

    protected static $_table_name  = 't_product';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'name',
        'category_id',
        'serial_number',
        'img',
        'price',
        'saleoff',
        'quantity',
        'status',
        'created_date',
        'updated_date',
    );
    protected static $_belong_to   = array(
        'tcategory' => array(
            'key_from'       => 'category_id',
            'model_to'       => 'Model_Tcategory',
            'key_to'         => 'id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'account'   => array(
            'key_from'       => 'account_id',
            'model_to'       => 'Model_account',
            'key_to'         => 'id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
    );

    /**
     * relation tproductdtl table
     *
     * @var property of ORM package
     * @access protected
     * @author Nguyen Van Loi
     */
    protected static $_has_many = array(
        'tproductdtl' => array(
            'key_from'       => 'id',
            'model_to'       => 'Model_Tproductdtl',
            'key_to'         => 'product_id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
    );

    public static function getProducts($id) {

        $products = Model_Tproduct::query()
                ->related('tproductdtl')
                ->where('id', $id)
                ->get_one();

        return $products;
    }

    public static function getProductsPagination($pagination, $categoryId) {


        $query = Model_Tproduct::query()
                ->where('category_id', $categoryId)
                ->where('status', 0)
                ->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();
        return $query;
    }

    public static function getProductsPaginationHome($pagination) {


        $query = Model_Tproduct::query()
                ->where('status', 0)
                ->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();
        return $query;
    }

    public static function countProductsPagination($categoryId) {
        $num = Model_Tproduct::query()
                ->where('category_id', $categoryId)
                ->count();
        return $num;
    }

    public static function countProducts() {
        $num = Model_Tproduct::query()
                ->count();
        return $num;
    }

    // 0||sp binh thuong 1||sp saleoff 2||sp đã hết
    public static function getProductsByName($pagination, $name, $categoryId) {

        $query = Model_Tproduct::query()
                ->where('name', 'like', '%' . $name . '%');

        if ($categoryId != -1) {
            $query->where('category_id', $categoryId);
        }
        //  ->where('status', 0)
        $query->rows_offset($pagination->offset);
        $query->rows_limit($pagination->per_page);

        return $query->get();
    }

    // 0||sp binh thuong 1||sp saleoff 2||sp đã hết
    public static function getProductsSaleOffByName($pagination, $name, $categoryId) {

        $query = Model_Tproduct::query()
                ->where('name', 'like', '%' . $name . '%')
                ->where('category_id', $categoryId)
                ->where('status', 1)
                ->rows_offset($pagination->offset)
                ->rows_limit($pagination->per_page)
                ->get();
        return $query;
    }

    /**
     *
     * @param type $categoryId
     * @return type
     */
    public static function getProductsSaleOff($categoryId) {

        $query = Model_Tproduct::query()
                ->where('category_id', $categoryId)
                ->where('status', 1)
               // ->rows_limit(8)
                ->get();
        return $query;
    }

    public static function getProductsByCategoryID($categoryId) {

        $query = Model_Tproduct::query()
                ->where('category_id', $categoryId)
                //  ->where('status', 0)
              //  ->rows_limit(8)
                ->get();
        return $query;
    }

    public static function countProductsByName($name, $categoryId) {

        $num = Model_Tproduct::query()
                ->where('name', 'like', '%' . $name . '%');

        if ($categoryId != -1) {
            $num->where('category_id', $categoryId);
        }

        $num->where('status', 0);

        return $num->count();
    }

    /**
     * get object product.
     *
     * @param string $product product_id
     * @return product
     */
    public static function get_all_product() {
        $products = Model_Tproduct::query()
                ->related('tproductdtl')
                ->get();
        return $products;
    }

    public static function getProductsByConditionSearch($name) {

        $query = Model_Tproduct::query()
                ->where('name', 'like', '%' . $name . '%');
        return $query->get();
    }

}
