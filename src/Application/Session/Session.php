<?php

namespace Application\Session;

/**
 * 
 * Description of Session
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class Session {

    public static function get($key, $default = null) {
        if (static::exists($key)) {
            return $_SESSION[$key];
        }

        return $default;
    }

    public static function exists($key) {
        return (isset($_SESSION[$key])) ? true : false;
    }

    public static function destroy($key) {
        if (static::exists($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function set($name, $value) {
        return $_SESSION[$name] = $value;
    }

}
