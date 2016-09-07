<?php
class Cookie {
    public static function exists ($name) {
        return (isset($_COOKIE[$name]));
    }

    public static function get ($name) {
        if (self::exists($name)) {
            return $_COOKIE[$name];
        }
        return '';
    }

    public static function put ($name, $value, $expiry) {
        if (setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }

    public static function delete ($name) {
        if (self::exists($name)) {
            self::put($name, '', -1);
        }
    }
}
?>
