<?php

class Model_Tnews extends \Orm\Model {

    protected static $_table_name  = 't_news';
    protected static $_primary_key = array(
        'id'
    );
    protected static $_properties  = array(
        'id',
        'name',
        'description',
        'img',
        'title',
        'created_date',
        'updated_date',
    );

    /**
     *
     * @param type $pagination
     * @param type $name
     * @return type
     */
    public static function getNews($pagination, $name) {
        $query = Model_Tnews::query()
                ->where('name', 'like', '%' . $name . '%')
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
    public static function countNewsPagination() {
        $num = Model_Tnews::query()
                ->count();
        return $num;
    }

}
