<?php
class Input {
    public static function exists ($type = 'any') {
        switch ($type) {
            case 'post':
                return !empty($_POST);
            break;

            case 'get':
                return !empty($_GET);
            break;

            case 'any':
                return !empty($_POST) || !empty($_GET);
            break;

            default:
                return false;
            break;
        }
    }

    public static function get ($item) {
        if (isset($_POST[$item])) {
            return unescape($_POST[$item]);
        }
        elseif (isset($_GET[$item])) {
            return unescape($_GET[$item]);
        }
        else {
            return '';
        }
    }

    public static function has ($item) {
        return isset($_POST[$item]) || isset($_GET[$item]);
    }

    public static function getAsBool ($item) {
        return (Input::get($item) == true) ? true : false;
    }
}
?>
