<?php

class Model_Contact extends \Orm\Model {

    protected static $_table_name  = 'contact';
    protected static $_primary_key = array('id');
    protected static $_properties  = array(
        'id',
        'name',
        'last_name',
        'email',
        'organization',
        'phone',
        'reason',
        'common',
        'created_date'
    );

    /**
     * Create change password validation object
     *
     * @return object return a validation object
     *
     * @access public
     * @author Nguyen Van Loi
     */
    public static function validate_send_contact() {

        $val = Validation::forge();
        $val->add('username', __('account.username'))
                ->add_rule('required')
                ->add_rule('min_length', 5)
                ->add_rule('max_length', 255);

        $val->add('email', __('account.email'))
                ->add_rule('required')
                ->add_rule('valid_email');
        $val->add('oganization', __('contact.oganization'))
                ->add_rule('required')
                ->add_rule('max_length', 50);
        $val->add('mobile', __('contact.phone'))
                ->add_rule('required')
                ->add_rule('regex_match[/^[0-9]{10}$/]');
        return $val;
    }

}
