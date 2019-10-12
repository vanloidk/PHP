<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Tasks;

/**
 * get Holiday task
 *
 * @package		Fuel
 * @version		1.0
 */
class holiday
{
    /**
     * run task
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     */
    public static function run()
    {
        try {
            //begin transaction
            \DB::start_transaction();

            // get google calendar api key and calendar id of each country
            $google_calendar  = \Model_Nationalholiday::get_google_calendar_info();
            $api_key          = '';
            $created_calenlog = '';

            // get calendar of each country
            foreach ($google_calendar as $country => $google_calen_id) {

                if ($country == 'google_api_key') {
                    $api_key = $google_calen_id['common_key'];

                } elseif (!empty ($api_key) AND isset($google_calen_id['google_calendar_id'])) {
                    // get calendar of the country
                    $tmp_log = holiday::get_calendar($country, $api_key, $google_calen_id['google_calendar_id']);
                    $created_calenlog = $created_calenlog . $tmp_log;
                }
            }

            // save created log
            \Fuel\Tasks\Holiday::log($created_calenlog);
        } catch (Exception $e){

            var_dump('error');
            // rollback pending transactional queries
            \DB::rollback_transaction();

            //log
            \Fuel\Tasks\Holiday::log('Crontab update holidays fail: ' . $e);
        }
    }

    /**
     * get calendar from google calendar API
     *
     * @param string $country abbreviation of the country [ja, us]
     * @param string $google_api_key google api key
     * @param string $calendar_id google calendar id
     * @return mixed
     *
     */
    protected static function get_calendar($country, $google_api_key, $calendar_id)
    {
        $url                     = "https://www.googleapis.com/calendar/v3/calendars/{$calendar_id}/events";
        $start_date_to_get_calen = date('Y-m-d', time()+86400);
        $two_months_ago          = date('Y-m-01',date(strtotime("-2 month",  strtotime(date('Y-m-01', time())))));
        $count_holiday_ago       = \Model_Nationalholiday::query()
                                 ->where(\DB::expr('DATE_FORMAT(date,"%Y-%m")'), "=", date('Y-m',  strtotime($two_months_ago)))
                                 ->where('country', $country)
                                 ->count();

        //if there is no holiday in 2 months ago in DB -> get holiday from 2 months ago
        if ($count_holiday_ago == 0) {
            $start_date_to_get_calen = $two_months_ago;
        }

        //query data
        $query_data = array(
            'key'          => $google_api_key,
            'timeMin'      => $start_date_to_get_calen."T00:00:00Z",
            'singleEvents' => 'true',
            'orderBy'      => 'startTime'
        );

        $query    = $url . '?' . http_build_query($query_data);
        $contents = file_get_contents($query);
        var_dump($contents); exit();
        if ($contents === false) {
            //log
            \Fuel\Tasks\Holiday::log('Crontab update holidays fail. Google Calendar API error');
            return false;
        }

        //delete future holidays
        \Model_Nationalholiday::query()
                ->where('date', '>', $start_date_to_get_calen)
                ->where('country', $country)
                ->delete();

        //recreate holidays
        $data = json_decode($contents,true);
        foreach ($data['items'] as $holiday){
            \Model_Nationalholiday::forge(array(
                'date'    => $holiday['start']['date'],
                'country' => $country
            ))->save();
        }

        //commit transaction
        \DB::commit_transaction();

        //log
        $range  = \DB::query('SELECT MIN(date) as min, MAX(date) as max FROM national_holiday')->execute();
        $tmp_log = "Create successful holidays for country[{$country}]. Holidays database are stored from " . substr($range[0]['min'], 0, 7) . ' to ' .substr($range[0]['max'], 0, 7) . PHP_EOL;
        return $tmp_log;
    }

    /**
     * Write log
     *
     * @param int $txt text to write
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     */
    protected static function log($txt)
    {
        if(!\File::exists(LOG_FILE_DIR.'/tmd/crontab.log')){
            if(!is_dir(LOG_FILE_DIR.'/tmd/')){
                \File::create_dir(LOG_FILE_DIR, 'tmd', 0755);
            }
            \File::create(LOG_FILE_DIR, '/tmd/crontab.log', null);
        }

        \File::append(LOG_FILE_DIR, '/tmd/crontab.log', date('Y-m-d H:i:s'). "\n" . $txt. "\n");
    }

}
