<?php

/**
 * /input.php
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Dao Anh Minh
 * @package tmd
 * @since Nov 21, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */

/**
 * input
 *
 * <pre>
 * </pre>
 *
 * @copyright Copyright (C) 2014 X-TRANS inc.
 * @author Dao Anh Minh
 * @package tmd
 * @since Nov 21, 2014
 * @version $Id$
 * @license X-TRANS Develop License 1.0
 */
class Input extends Fuel\Core\Input
{

    /**
     * Fetch an item from the POST array and trim spaces at the beginning an end
     *
     * @param   string  The index key
     * @param   mixed   The default value
     * @return  string|array
     *
     * @access public
     *
     * @author Dao Anh Minh
     * @version 1.0
     * @since 1.0
     */
    public static function post($index = null, $default = null)
    {
        //get POST value
        $post = parent::post($index, $default);

        //return POST value with trim all spaces at the beginning and end
        return trim_post($post);
    }

    /**
     * get field value
     *
     * @param string  The index key
     * @param object $object object value
     * @param string $key key to get in $object
     * @param mixed $default default value
     * @return  mixed
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Bui Huu Phuc
     */
    public static function get_field_value($index = null, $object = null, $key = null, $default = '')
    {
        if($key === null){
            $key = $index;
        }

        if (isset($object)) {
            return Input::post($index, $object->$key);
        }

        return Input::post($index, $default);
    }

}

/**
 * Perform trim all element in POST value
 *
 * @param mixed $post POST value
 * @return string|array
 *
 * @access public
 *
 * @author Dao Anh Minh
 * @version 1.0
 * @since 1.0
 */
function trim_post($post)
{
    if (!is_array($post)) {
        //trim string only
        if (is_string($post)) {
            return trim($post);
        } else {
            return $post;
        }
    }
    return array_map('trim_post', $post);
}
