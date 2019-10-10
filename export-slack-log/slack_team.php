<?php

/**
 * /slack_backup.php
 *
 * @author Nguyen Van Loi
 * @package export_slack_log
 * @since Feb 18, 2016
 * @version $Id$
 */
/**
 * slack backup
 *
 * @package slack
 *
 * @version	 1.2
 * @author	Nguyen Van Loi
 */
// get data for each team
// save data for each team

include_once './slack_channel.php';

class slack_team
{

    protected $token = "";

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
    public static function getAllContentTeam()
    {
        $teams        = array("AA", "BB");
        $contentTeams = "";
        foreach ($teams as $team) {
            $contentChannel = slack_chanel::getAllContentChannel($team->token);
            array_push($contentTeams, $contentChannel);
        }
        return $contentTeams;
    }

}
