<?php
class DateFormat {
    public static function sql ($timestamp = '') {
        if ($timestamp === '') {
            $timestamp = time();
        }
        return date('Y-m-d H:i:s', $timestamp);
    }
}
?>
