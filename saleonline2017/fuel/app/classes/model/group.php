<?php

use Auth\Model;

class Model_Group extends Auth\Model\Auth_Group
{

    // protected static $_table_name = 'group';

    /**
     *
     * @param type $group_id
     * @return type
     */
    public static function get_group($flag = null)
    {
        $groups = Model\Auth_Group::query()->select('*')
                ->get();

        //convert to array
        $groups_rs = array();
        foreach ($groups as $key => $obj) {
            //$groups[$key] = $obj->to_array();
            if ($flag) {
                $groups_rs[0] = "all";
                $flag         = false;
            }
            $groups_rs[$key] = $obj->name;
        }
        return $groups_rs;
    }

}
