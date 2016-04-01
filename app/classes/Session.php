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

    public static function addSuccess ($message = '') {
        self::flashWriteArray('successes', array($message));
    }

    public static function addSuccessArray ($message = array()) {
        self::flashWriteArray('successes', $message);
    }

    public static function addInfo ($message = '') {
        self::flashWriteArray('info', array($message));
    }

    public static function addInfoArray ($message = array()) {
        self::flashWriteArray('info', $message);
    }

    public static function addWarning ($message = '') {
        self::flashWriteArray('warnings', array($message));
    }

    public static function addWarningArray ($message = array()) {
        self::flashWriteArray('warnings', $message);
    }

    public static function addError ($message = '') {
        self::flashWriteArray('errors', array($message));
    }

    public static function addErrorArray ($message = array()) {
        self::flashWriteArray('errors', $message);
    }

    public static function getCacheId () {
        return json_encode(self::get('successes')).json_encode(self::get('info')).json_encode(self::get('warnings')).json_encode(self::get('errors'));
    }
}
?>
