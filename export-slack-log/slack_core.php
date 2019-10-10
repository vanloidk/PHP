<?php

/**
 * /slack_core.php
 *
 * @copyright Copyright (C) 2016 X-TRANS inc.
 * @author Nguyen Van Loi
 * @package export_slack_log
 * @since Feb 18, 2016
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */

/**
 * slack core
 *
 * @package slack_core
 *
 * @version	 1.2
 * @author	Nguyen Van Loi
 */
class slack_core
{

    protected $argv;

    public function setArgv($argv)
    {
        foreach ($argv as $num => $value) {
            if (isset($argv[$num + 1])) {
                $val = $argv[$num + 1];
            } else {
                $val = null;
            }
            if (!is_null($val)) {
                switch ($value) {
                    case '-help':
                    case '-h':
                        $config['help']       = $val;
                        break;
                    case '--version':
                    case '-v':
                        $config['version']    = $val;
                        break;
                    case '-path':
                    case '-p':
                        $config['path']       = $val;
                        break;
                    case '--from':
                    case '-f':
                        $config['from']       = $val;
                        break;
                    case '--to':
                    case '-t':
                        $config['to']         = $val;
                        break;
                    case '--token-path':
                    case '-T':
                        $config['token-path'] = $val;
                        break;
                }
            }
        }
        $this->setParameter($config);
    }

    public function setParameter($param)
    {
        if (isset($config['help']))
            $this->setHelp($config['help']);
        if (isset($config['version']))
            $this->setVersion($config['version']);
    }

    /**
     * 
     * @param type $help
     */
    public function setHelp($help)
    {
        $this->key = $help;
    }
    
    /**
     * 
     * @param type $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

}
