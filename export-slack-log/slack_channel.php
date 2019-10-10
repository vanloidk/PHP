<?php

/**
 * /slack_backup.php
 *
 * @copyright Copyright (C) 2015 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package export_slack_log
 * @since Feb 18, 2016
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
/**
 * slack backup
 *
 * @package slack
 *
 * @version	 1.2
 * @author	Nguyen Van Loi
 */
include_once './slack_api.php';

class slack_chanel extends slack_api
{

    public $token = "xoxp-21917150469-21920192049-21921000482-8e38581177";
    public $path  = "https://slack.com/api/";
    public $from  = "0";
    public $to    = "10";

    //get list chanel
    // save data for each channel

    /**
     * run task
     *
     * @return void
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public static function getAllContentChannel()
    {
        $lstChannel = $this->getListChannel();
        //var_dump($lstChannel['channels']); exit();
        //fetch in all channel
        $test       = array();
        foreach ($lstChannel['channels'] as $channel) {
            $url        = "https://slack.com/api/channels.history?token=xoxp-21917150469-21920192049-21921000482-8e38581177&"
                    . "channel=" . $channel['id'] . "&latest=0&oldest=10&pretty=1";
            //var_dump($url); exit();
            $curl       = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            $lstChannel = curl_exec($curl);
            curl_close($curl);
            $res        = json_decode($lstChannel, true);
            array_push($test, $res);
        }

        return $test;
    }

}

$slackChanel = new slack_chanel();
$slackChanel->getAllContentChannel();
