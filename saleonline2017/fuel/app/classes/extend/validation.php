<?php

/**
 * /validation.php
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Bui Huu Phuc
 * @package optask
 * @since Sep 4, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */

/**
 * Validation
 *
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Bui Huu Phuc
 * @package optask
 * @version 1.0
 * @license X-TRANS Develop License 1.0
 */
class Validation extends Fuel\Core\Validation {

    /**
     * modify input value before validation
     *
     * @param array $input Assoc array of input fields and values
     * @param bool $allow_partial If false, all fields that have validation rules defined MUST be present in the input
     * @param array $name Any additional callables required to run all defined validation rules
     * @return boolean $temp_callables of validation
     *
     * @return boolean
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Dao Anh Minh
     */
    public function run($input = null, $allow_partial = false, $temp_callables = array()) {
        if ($input == null) {
            $input = Input::post();
        }
        return parent::run($input, $allow_partial, $temp_callables);
    }

    /**
     * validate username Alphanumeric character and - _ . @
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_username($val) {
        Validation::active()->set_message('username', __('message.the_field_:label_is_invalid_account'));
        if (empty($val)) {
            return true;
        }
        return (boolean) preg_match('/^[\w\-\.\@]+$/', $val);
    }

    /**
     * validate password Includes at least 1 numeric, 1 uppercase letter, 1 lowercase letter, 1 special symbol.
     *
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author 
     */
    public static function _validation_password($val) {
        Validation::active()->set_message('password', __('message.the_field_:label_is_invalid_password'));
        if (empty($val)) {
            return true;
        }

        //check all 1 byte character
        if (Str::length($val) != strlen($val)) {
            return false;
        }

        return (boolean) preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[\!\"\#\$\%\&\'\(\)\*\+\,\-\.\/\:\;\<\=\>\?\@\[\]\^\_\`\{\|\}\~]).{8,}$/', $val);
    }

    /**
     * validate username unique
     *
     *
     * @param mix $val value need to validate
     * @param string $action (create|edit)
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_username_unique($val, $id = null) {
        Validation::active()->set_message('username_unique', __('message.this_:label_already_exists'));
        $account = \Model_Account::find('first', array(
                    'where' => array(
                        array('username', $val),
                    ),
        ));

        if (empty($account)) {
            return true;
        }

        if ($id) {
            return $account->id == $id;
        }

        return false;
    }

    /**
     * validate start time < end time
     *
     * @param string $val value need to validate
     * @param string $end end time
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_starttime($val, $end) {
        $result = $val < $end;
        Validation::active()->set_message('starttime', __('message.closing_time_must_be_greater_than_opening_time'));
        return (boolean) $result;
    }

    /**
     * validate end time > start time
     *
     * @param string $val value need to validate
     * @param string $end end time
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_endtime($val, $start) {
        $result = $val > $start;
        Validation::active()->set_message('endtime', __('message.closing_time_must_be_greater_than_opening_time'));
        return (boolean) $result;
    }

    /**
     * validate number and real number
     *
     * @param string $val data from POST
     *
     * @return boolean result of validate
     *
     * @access public
     * @author Dao Anh Minh
     */
    public static function _validation_number($val) {
        Validation::active()->set_message('number', __('message.please_enter_:label_correct_number'));
        return (boolean) preg_match('/^-?(?:\d+|\d*\.\d+)$/', $val);
    }

    /**
     * Validate date based on format inputed
     *
     * @param string $data date or time
     * @param string $format date or time's format
     *
     * @return boolean result of validate
     *
     * @access protected
     * @author Dao Anh Minh
     */
    protected static function validate_date($data, $format = '') {
        $valid = DateTime::createFromFormat($format, $data);
        Validation::active()->set_message('date', __('message.this_:label_format_is_yyyy/mm/dd'));
        return $valid AND $valid->format($format) == $data;
    }

    /**
     * Validate time
     *
     * @param string $val data from POST
     *
     * @return boolean result of validate
     *
     * @access public
     * @author Dao Anh Minh
     */
    public static function _validation_time($val) {
        Validation::active()->set_message('time', __('message.this_:label_format_is_HH:MM'));
        return Validation::validate_date($val, 'H:i');
    }

    /**
     * Validate time with format H:i
     *
     * @param string $end_time closing time
     * @param string $start_time opening time
     *
     * @return boolean result of validate
     *
     * @access public
     * @author Dao Anh Minh
     *
     * @version 1.0
     * @since 1.0
     */
    public static function _validation_end_time($end_time, $start_time) {
        $result = strtotime($end_time) != strtotime($start_time);
        Validation::active()->set_message('end_time', __('message.opening_time_must_differ_closing_time'));
        return (boolean) $result;
    }

    /**
     * Validate time with format H:i
     *
     * @param string $start_time opening time
     * @param string $end_time closing time
     *
     * @return boolean result of validate
     *
     * @access public
     * @author Dao Anh Minh
     *
     * @version 1.0
     * @since 1.0
     */
    public static function _validation_start_time($start_time, $end_time) {
        $result = strtotime($end_time) != strtotime($start_time);
        Validation::active()->set_message('start_time', __('message.opening_time_must_differ_closing_time'));
        return (boolean) $result;
    }

    /**
     * Validate date with format yyyy/mm/dd
     *
     * @param string $val string of date
     * @return boolean resutl of validate
     *
     * @access public
     * @author Dao Anh Minh
     *
     * @version 1.0
     * @since 1.0
     */
    public static function _validation_date($val) {
        Validation::active()->set_message('date', __('message.this_:label_format_is_yyyy/mm/dd'));
        return Validation::validate_date($val, 'Y/m/d');
    }

    /**
     * Validate date with format yyyy/mm
     *
     * @param string $val string of date
     * @return boolean resutl of validate
     *
     * @access public
     * @author Nguyen Van Hiep
     *
     * @version 1.0
     * @since 1.0
     */
    public static function _validation_month_date($val) {
        Validation::active()->set_message('month_date', __('message.this_:label_format_is_yyyy/mm/dd'));
        $val = $val . '/01';
        return Validation::validate_date($val, 'Y/m/d');
    }

    /**
     * validate old password
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_old_password($val) {
        Validation::active()->set_message('old_password', __('message.this_:label_does_not_match_current_password'));
        return (Auth::get('password') === Auth::hash_password($val));
    }

    /**
     * validate old password
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_new_password($val) {
        Validation::active()->set_message('new_password', __('message.new_password_is_the_same_as_current_password'));
        return ($val !== Input::post('old_password'));
    }

    /**
     * validate old password
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_confirm_password($val) {
        Validation::active()->set_message('confirm_password', __('message.new_password_does_not_match_confirmed_password'));
        return ($val === Input::post('new_password'));
    }

    /**
     * validate primary group
     *
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function _validation_primary_group() {
        Validation::active()->set_message('primary_group', __('message.please_select_:label'));
        $group = Input::post('group');
        if (!empty($group)) {
            $primary_id = Input::post('primary_group');
            if (empty($primary_id)) {
                return false;
            }

            //check primary group is not lock
            $primary_group = Model_Mstgroup::find($primary_id);
            if ($primary_group->lock) {
                return false;
            }
        }

        return true;
    }

    /**
     * validate group account
     *
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public static function _validation_group_account() {
        $group = Input::post('group');
        Validation::active()->set_message('group_account', __('message.please_select_:label'));
        return !empty($group);
    }

    /**
     * validate unique position
     *
     * @param mix $val value need to validate
     * @param string $options table column to validate unique
     * @param object $obj object to validate
     *
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Hiep
     */
    public static function _validation_unique_position($val, $options, $obj) {
        $result = $obj->find('first', array(
            'where' => array(
                array('id', '!=', $obj['id']),
                array($options => $val)
            )
        ));
        Validation::active()->set_message('unique_position', __('message.this_:label_already_exists'));
        return (boolean) (count($result) == 0);
    }

    /**
     * validate unique position
     *
     * @param mix $val value need to validate
     * @param string $options table column to validate unique
     * @param object $obj object to validate
     *
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Hiep
     */
    public static function _validation_unique_group($val, $options, $obj) {
        $result = $obj->find('first', array(
            'where' => array(
                array('id', '!=', $obj['id']),
                array($options => $val)
            )
        ));
        Validation::active()->set_message('unique_group', __('message.this_:label_already_exists'));
        return (boolean) (count($result) == 0);
    }

    /**
     * Validate target group
     *
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_target_groups() {
        $groups = (Input::post('group') != null) ? Input::post('group') : array();
        Validation::active()->set_message('target_groups', __('message.registration_failed'));

        foreach ($groups as $group_id) {
            //prevent shiftwork
            if (Input::post('date_select_type') == SHIFT_CHECKBOX) {
                $group = Model_Mstgroup::find($group_id);
                if ($group->shiftwork_flag == false) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Validate group selection
     *
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_group_selection() {
        Validation::active()->set_message('group_selection', __('message.please_select_:label'));
        $groups = Input::post('group');
        return !empty($groups);
    }

    /**
     * Validate group selection
     *
     *
     * @param mix $val value need to validate
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_groups_exist() {
        Validation::active()->set_message('groups_exist', __('message.group_not_exist'));
        $groups = Input::post('group');
        $ret    = true;
        foreach ($groups as $val) {
            $result = Model_Mstgroup::get_active_group_by_id($val);
            if (!$result) {
                $ret = false;
                break;
            }
        }
        return $ret;
    }

    /**
     * Validate auth selection
     *
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_auth_selection() {
        Validation::active()->set_message('auth_selection', __('message.please_select_:label'));
        $auths = Input::post('authority');
        return !empty($auths);
    }

    /**
     * Validate position selection
     *
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_position_selection() {
        Validation::active()->set_message('position_selection', __('message.please_select_:label'));
        $pos = Input::post('shift_position');
        return !empty($pos);
    }

    /**
     * Validate shift selection
     *
     * @return boolean result of validation
     *
     * @since 1.0
     * @version 1.0
     * @access public
     * @author Nguyen Van Hiep
     */
    public static function _validation_shift_selection() {
        Validation::active()->set_message('shift_selection', __('message.please_select_:label'));
        $shifts = Input::post('shiftwork');
        return !empty($shifts);
    }

    /**
     * validate unique type
     *
     * @param mix $val value need to validate
     * @param string $options table column to validate unique
     * @param object $obj object to validate
     *
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public static function _validation_unique_type($val, $options, $obj) {
        $result = $obj->find('first', array(
            'where' => array(
                array('id', '!=', $obj['id']),
                array($options => $val)
            )
        ));
        Validation::active()->set_message('unique_type', __('message.this_:label_already_exists'));
        return (count($result) == 0);
    }

    /**
     * validate unique holiday
     *
     * @param mix $val value need to validate
     * @param string $options table column to validate unique
     * @param object $obj object to validate
     *
     * @return boolean result of validation
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Hiep
     */
    public static function _validation_unique_holiday($val, $options, $obj) {
        $result = $obj->find('first', array(
            'where' => array(
                array('id', '!=', $obj['id']),
                array($options => $val)
            )
        ));
        Validation::active()->set_message('unique_holiday', __('message.this_:label_already_exists'));
        return (count($result) == 0);
    }

}
