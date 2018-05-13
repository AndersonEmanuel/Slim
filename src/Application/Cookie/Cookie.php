<?php

namespace Application\Cookie;

class Cookie {

    /**
     * 
     * @param type $name
     * @return type
     */
    public static function exists($name) {
        return (isset(filter_input(INPUT_COOKIE, $name))) ? true : false;
    }

    /**
     * 
     * @param type $name
     * @return type
     */
    public static function get($name) {
        return filter_input(INPUT_COOKIE, $name);
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $expiry
     * @param type $secure
     * @return boolean
     */
    public static function set($name, $value, $expiry, $secure = false) {
        if (setcookie($name, $value, $expiry, '/', null, $secure, true)) {
            return true;
        }

        return false;
    }

    /**
     * 
     * @param type $name
     */
    public static function destroy($name) {
        self::set($name, '', time() - 1);
    }

}
