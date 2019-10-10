<?php

use Orm\Model;

class Model_Holiday extends Model
{

    protected static $_table_name  = 'holiday';
    protected static $_primary_key = array(
        'group_id',
        'holiday_id'
    );
    protected static $_properties  = array(
        'group_id',
        'holiday_id'
    );

    /**
     * made a relation to mst_holiday table
     *
     * @var ORM relation property
     *
     * @author Dao Anh Minh
     * @access protected
     */
    protected static $_belongs_to = array(
        'mst_holiday' => array(
            'key_from'       => 'holiday_id',
            'model_to'       => 'Model_Mstholiday',
            'key_to'         => 'id',
            'cascade_update' => false,
            'cascade_delete' => false
        ),
        'mst_group'   => array(
            'key_from'       => 'group_id',
            'model_to'       => 'Model_Mstgroup',
            'key_to'         => 'id',
            'cascade_update' => false,
            'cascade_delete' => false
        )
    );

    /**
     * Get all group corresponding with holiday id
     *
     * @param integer $holidayId holiday id
     * @return array contains only groups id
     *
     * @access public
     * @author Dao Anh Minh
     *
     * @version 1.0
     * @since 1.0
     */
    public static function get_group_by_holiday_id($holidayId)
    {
        $groups = Model_Holiday::query()
                ->where('holiday_id', '=', $holidayId)
                ->get();

        $ret = array();
        foreach ($groups as $val) {
            $ret[] = $val->group_id;
        }

        return $ret;
    }

    /**
     * get all holidays (addition holiday, national holiday) based on request type
     *
     * @param integer $request_type_id request type id
     * @param month $month month to get holiday
     * @return array all holidays in month
     *
     * @access public
     * @author Dao Anh Minh
     */
    public static function get_all_holidays_in_month($request_type_id)
    {

        //1. get all country abbreviation
        //2. get all national holidays corresponding country abbreviation
        $country_abbrevication = Model_Mstrequestgroup::get_country_abbreviation_based_on_request_type($request_type_id);
        if ($country_abbrevication != null) {
            $all_national_holidays = Model_Nationalholiday::query()
                    ->where('country', 'IN', $country_abbrevication)
                    ->get();

            //1. get all group id based on request type
            //2. get all addition holidays based on group ids
            $group_ids             = Model_Mstrequestgroup::get_group_ids_based_on_request_type($request_type_id);
            $all_addition_holidays = Model_Holiday::query()
                    ->related('mst_holiday')
                    ->related('mst_group')
                    ->where('mst_group.lock', false)
                    ->where('mst_group.id', 'IN', $group_ids)
                    ->get();


            $ret_national_holidays = array();
            foreach ($all_national_holidays as $each_holiday) {
                $format_date                         = date('d-m-Y', strtotime($each_holiday->date));
                $ret_national_holidays[$format_date] = '';
            }

            $ret_addition_holidays = array();
            foreach ($all_addition_holidays as $each_holiday) {
                $format_date                         = date('d-m-Y', strtotime($each_holiday->mst_holiday->holiday));
                $ret_addition_holidays[$format_date] = '';
            }
            $arr_holiday = array_merge($ret_addition_holidays, $ret_national_holidays);
        } else {
            $arr_holiday = null;
        }
        return $arr_holiday;
    }

}
