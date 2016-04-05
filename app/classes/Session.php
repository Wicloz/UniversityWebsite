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

    public static function flashRead ($name) {
        if (self::exists($name)) {
            $content = self::get($name);
            self::delete($name);
            return $content;
        }
        return '';
    }

    public static function flashWriteNotification ($name, $content = array(), $permanent) {
        $objects = array();
        foreach ($content as $message) {
            $obj = new stdClass();
            $obj->message = $message;
            $obj->permanent = $permanent;
            $objects[] = $obj;
        }

        if (!self::exists($name)) {
            self::put($name, $objects);
        } else {
            self::put($name, array_merge(self::get($name), $objects));
        }
    }

    public static function addSuccess ($message = '', $permanent) {
        self::addSuccessArray(array($message), $permanent);
    }

    public static function addSuccessArray ($message = array(), $permanent) {
        self::flashWriteNotification('successes', $message, $permanent);
    }

    public static function addInfo ($message = '', $permanent) {
        self::addInfoArray(array($message), $permanent);
    }

    public static function addInfoArray ($message = array(), $permanent) {
        self::flashWriteNotification('info', $message, $permanent);
    }

    public static function addWarning ($message = '', $permanent) {
        self::addWarningArray(array($message), $permanent);
    }

    public static function addWarningArray ($message = array(), $permanent) {
        self::flashWriteNotification('warnings', $message, $permanent);
    }

    public static function addError ($message = '', $permanent) {
        self::addErrorArray(array($message), $permanent);
    }

    public static function addErrorArray ($message = array(), $permanent) {
        self::flashWriteNotification('errors', $message, $permanent);
    }

    public static function getCacheId () {
        return json_encode(self::get('successes')).json_encode(self::get('info')).json_encode(self::get('warnings')).json_encode(self::get('errors'));
    }
}
?>
