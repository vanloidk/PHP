<?php

class Model_UserOnline extends \Orm\Model {

    protected static $_table_name  = 'useronline';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'ip',
        'path_access',
        'sessionId',
        'time_temp'
    );

    public static function delete_userOffline($newTime) {
        $isDelete = Model_UserOnline::query()
                ->where('time_temp', '<=', $newTime)
                ->delete();
        return $isDelete;
    }

    public static function get_useronline() {
        $userOnline = DB::query("SELECT distinct ip FROM useronline")->execute();
        return $userOnline;
    }

    public static function get_userOffline($newTime) {
        $userOffline = Model_UserOnline::query()
                ->where('time_temp', '<', $newTime)
                ->count();
        return $userOffline;
    }

}
