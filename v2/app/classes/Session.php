<?php
class Session {
    public static function exists ($name) {
        return isset($_SESSION[$name]);
    }

    public static function put ($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public static function get ($name) {
        return $_SESSION[$name];
    }

    public static function delete ($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flashWrite ($name, $content = '') {
        self::put($name, $content);
    }

    public static function flashWriteArray ($name, $content = array()) {
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

    public static function addSuccess ($content = '') {
        self::flashWriteArray('successes', array($content));
    }

    public static function addSuccessArray ($content = array()) {
        self::flashWriteArray('successes', $content);
    }

    public static function addInfo ($content = '') {
        self::flashWriteArray('info', array($content));
    }

    public static function addInfoArray ($content = array()) {
        self::flashWriteArray('info', $content);
    }

    public static function addWarning ($content = '') {
        self::flashWriteArray('warnings', array($content));
    }

    public static function addWarningArray ($content = array()) {
        self::flashWriteArray('warnings', $content);
    }

    public static function addError ($content = '') {
        self::flashWriteArray('errors', array($content));
    }

    public static function addErrorArray ($content = array()) {
        self::flashWriteArray('errors', $content);
    }
}
?>
