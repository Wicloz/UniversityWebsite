<?php
class Session {
    public static function exists ($name) {
        return isset($_SESSION[$name]);
    }

    public static function get ($name) {
        if (self::exists($name)) {
            return $_SESSION[$name];
        }
        return '';
    }

    public static function put ($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public static function delete ($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flashWrite ($name, $content = '') {
        self::put($name, $content);
    }

    public static function flashMergeArray ($name, $content = array()) {
        if (!self::exists($name)) {
            self::put($name, $content);
        } else {
            self::put($name, array_merge(self::get($name), $content));
        }
    }

    public static function flashRead ($name) {
        if (self::exists($name)) {
            $content = self::get($name);
            self::delete($name);
            return $content;
        }
        return '';
    }
}
?>
