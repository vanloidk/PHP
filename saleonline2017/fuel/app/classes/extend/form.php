<?php

/**
 * /form.php
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @version $Id$
 * @license 
 */

/**
 * Form
 *
 * <pre>
 * </pre>
 *
 * @copyright 
 * @author Nguyen Van Loi
 * @package tmd
 * @version 1.0
 * @license 
 */
class Form extends Fuel\Core\Form
{

    /**
     * display error in form
     *
     * @param string $key key of error
     * @param array $err array form error
     * @return string error
     *
     * @access public
     * @since 1.0
     * @version 1.0
     * @author Nguyen Van Loi
     */
    public static function error($key, $err)
    {
        if (!empty($err[$key])) {
            return '<p class="red_font">' . $err[$key] . '</p>';
        }
        return '';
    }

    /**
     * show error input form
     *
     * @param type $msgErr message error
     * @return string error
     *
     * @author Nguyen Van Loi
     */
    public static function checkErrorInput($msgErr)
    {
        if (!empty($msgErr)) {
            return '<p class="red_font">' . $msgErr . '</p>';
        }
        return "";
    }

}
