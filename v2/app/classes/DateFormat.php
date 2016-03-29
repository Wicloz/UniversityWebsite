<?php
class DateFormat {
    public static function sql ($time = '') {
        if ($time === '') {
            $time = time();
        }
        return date('Y-m-d H:i:s', $time);
    }
}
?>
