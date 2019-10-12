<?php

/**
 * /const.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @since Nov 19, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
// Role user
define('ADMIN', 1);
define('SALE', 2);
define('USER', 3);

//admin user
define('ADMIN_USER_ID', 1);

define('ADMIN_PORT', 'admin');
define('SALE_PORT', 'sale');
define('USER_PORT', 'user');
define('VISITOR_PORT', 'visitor');

define('COMMON_AREA', 'saleonline');

//log file directory
define('LOG_FILE_DIR', '/var/log');

// Request type
define('TYPE_NONE', '0');
define('TYPE_PAIDVACATION', '1');
define('TYPE_DAYOFF', '2');
define('TYPE_OVERTIME', '3');

//Value_select_type
define('TIME_RANGE', '0');
define('DATE_RANGE', '1');
define('NONE_SELECTED', '2');

//Day_off
define('WORKING', '0');
define('HALF_DAY_OFF', '1');
define('FULL_DAY_OFF', '2');

// confirm request
define('REQUEST_NEW', '0');
define('REQUEST_REJECTED', '1');
define('REQUEST_APPROVED', '2');
define('REQUEST_COMPLETION', '1');
define('REQUEST_UNCOMPLETE', '0');

// status approval
define('NOT_APPROVED', 0);
define('APPROVED', 1);

// request type color
define('ALL_TYPES', '0');

define('COLOR_SLIVER', 'label-default');
define('COLOR_BLUE', 'label-info');
define('COLOR_RED', 'label-danger');
define('COLOR_YELLOW', 'label-warning');
define('COLOR_DARK_BLUE', 'label-primary');

//Request type color
define('ALL_REQUEST_TYPES', 0);

// format date for history
define('DATE_FORMAT', 'Y/m');

//calendar event type
define('EVENT_NEW_SINGLE', 'event_new_single');
define('EVENT_NEW_MULTIPLE', 'event_new_multiple');
define('EVENT_PENDING', 'event_pending');
define('EVENT_APPROVED', 'event_approved');
define('EVENT_COMPLETION', 'event_completion');

// calculation
define('ADDITION', '0');
define('SUBTRACTION', '1');
define('NOT_CALCULATE', null);
define('DAY_ROUND', 2);
define('WORKING_TIME', 8);
define('HALFDAY_OFF', 4);
define('FULLDAY_OFF', 8);
define('NONE', 0);

//csv download
define('CONFIRM_CSV_FILE_NAME', 'User_Internal_Counter_');
define('REQUEST_APPROVAL_CSV', 'Request_Approval_');

define('INPUT_VALUE_0', 0);
define('INPUT_VALUE_1', 1);

// display calendar
define('SUNDAY', 0);
define('SATURDAY', 6);
define('START_WEEK_IN_MONTH', 1);
define('NUMBER_OF_DAY_IN_WEEK', 7);

// Item input type
define('TEXT_AREA', 0);
define('INPUT_TEXT', 1);
define('SELECT', 2);
define('REQUIRED_REASON', 1);

// Shiftwork flag
define('SHIFTWORK', 1);
define('NON_SHIFTWORK', 0);

// Default opening time and closing time
define('OPENING_TIME', '09:00');
define('CLOSING_TIME', '18:00');

// Date select type
define('ALL_DATES', '0');
define('WORKING_DATE_ONLY', '1');
define('HOLIDAY_ONLY', '2');

// Date select type
define('CHECKBOX', 0);
define('SHIFT_CHECKBOX', 1);

define('ACCEPTED', 1);
define('NOT_ACCEPTED', 0);

define('NOT_SHIFT_WORKING', 0);

define('SATURDAY_IS_HOLIDAY', 1);
define('SUNDAY_IS_HOLIDAY', 1);
define('ORIGINAL_HOLIDAY', 1);

define('SATURDAY_IS_NOT_HOLIDAY', 0);
define('SUNDAY_IS_NOT_HOLIDAY', 0);
define('NOT_ORIGINAL_HOLIDAY', 0);

define('DISPLAY_ALL_HOLIDAY', 1);

define('START_DATE_FOR_CONFIRM_REQUEST', 16);
define('END_DATE_FOR_CONFIRM_REQUEST', 15);

// Date pattern YYYY/MM/DD
define('DATE_PATTERN', '/^[0-9]{4}\/[0-9]{1,2}\/[0-9]{1,2}/');
define('DEFAULT_LANG', 'vi');
define('FIRST_WEEK_IN_MONTH', 1);
//define('USER_CONFIG_PATH',   'C:\xampp\htdocs\tmd\config');

define('USER_CONFIG_PATH', 'C:\xamppAdmin\htdocs\saleonline\config');
define('PER_PAGE', 16);
