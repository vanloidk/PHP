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
class slack_api
{

    public $token = "xoxp-21917150469-21920192049-21921000482-8e38581177";
    public $path  = "https://slack.com/api/";
    public $from  = "0";
    public $to    = "10";

    /**
     * getListChannel
     *
     * @return list channel slack
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public function getListChannel()
    {
        $url        = $this->path . "channels.list?" . "token=" . $this->token . "&pretty=1";
        $curl       = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        $lstChannel = curl_exec($curl);
        curl_close($curl);
        $res        = json_decode($lstChannel, true);
        return $res;
    }

}

//$slackapi = new slack_api();
//$slackapi->getListChannel();
