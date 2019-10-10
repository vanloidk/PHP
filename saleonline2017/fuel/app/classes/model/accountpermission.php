<?php

class Model_accountpermission extends Auth\Model\Auth_Permission
{

    protected static $_properties = array(
        'id',
        'area'        => array(
            'label'      => 'auth_model_permission.area',
            'null'       => false,
            'validation' => array('required', 'max_length' => array(25))
        ),
        'permission'  => array(
            'label'      => 'auth_model_permission.permission',
            'null'       => false,
            'validation' => array('required', 'max_length' => array(25))
        ),
        'description' => array(
            'label'      => 'auth_model_permission.description',
            'null'       => false,
            'validation' => array('required', 'max_length' => array(255))
        ),
        'actions'     => array(
            //'data_type'	  => 'serialize',
            'default' => array(),
            'null'    => false,
        //'form'  	  => array('type' => false),
        ),
        'user_id'     => array(
            'default' => 0,
            'null'    => false,
            'form'    => array('type' => false),
        ),
        'created_at'  => array(
            'default' => 0,
            'null'    => false,
            'form'    => array('type' => false),
        ),
        'updated_at'  => array(
            'default' => 0,
            'null'    => false,
            'form'    => array('type' => false),
        ),
    );

}
