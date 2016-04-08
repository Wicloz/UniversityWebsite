<?php
class Notifications {
    public static function setNotifications ($content = array(), $level, $permanent = true) {
        $objects = array();
        foreach ($content as $message) {
            $obj = new stdClass();
            $obj->message = $message;
            $obj->permanent = $permanent;
            $objects[] = $obj;
        }
        Session::flashMergeArray('notifications-'.$level, $objects);
    }

    public static function setAlerts ($content = array(), $level, $permanent = false) {
        $objects = array();
        foreach ($content as $message) {
            $obj = new stdClass();
            $obj->message = $message;
            $obj->permanent = $permanent;
            $objects[] = $obj;
        }
        Session::flashMergeArray('alerts-'.$level, $objects);
    }

    public static function addDebug ($content) {
        if (is_array($content)) {
            self::setNotifications($content, 'info');
        } else {
            self::setNotifications(array($content), 'info');
        }
    }

    public static function addError ($content) {
        if (is_array($content)) {
            self::setNotifications($content, 'error');
        } else {
            self::setNotifications(array($content), 'error');
        }
    }

    public static function addValidationFail ($content) {
        if (is_array($content)) {
            self::setAlerts($content, 'error', true);
        } else {
            self::setAlerts(array($content), 'error', true);
        }
    }

    public static function addSuccess ($content) {
        if (is_array($content)) {
            self::setAlerts($content, 'success');
        } else {
            self::setAlerts(array($content), 'success');
        }
    }

    public static function getAsJson ($clear = false) {
        $messages = array(
            'notifications-success',
            'notifications-info',
            'notifications-warning',
            'notifications-error',
            'alerts-success',
            'alerts-info',
            'alerts-warning',
            'alerts-error'
        );

        $data = array();
        foreach  ($messages as $name) {
            $data[$name] = Session::get($name);
            if (empty($data[$name])) {
                $data[$name] = array();
            }
            if ($clear) {
                Session::delete($name);
            }
        }

        return json_encode($data);
    }
}
?>
