<?php

class Model_accountrolepermission extends Auth\Model\Auth_Rolepermission
{

    protected static $_properties = array(
        'id',
        'role_id',
        'perms_id',
        'actions' => array(
            //'data_type'	  => 'serialize',
            'default' => array(),
            'null'    => false,
        //'form'  	  => array('type' => false),
        ),
    );

}
