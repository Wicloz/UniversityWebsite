<?php
class DateFormat {
    public static function sql ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
        return date('Y-m-d H:i:s', $timestamp);
    }

    public static function sqlDate ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
        return date('Y-m-d', $timestamp);
    }

    public static function sqlTime ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
        return date('H:i:s', $timestamp);
    }

    public static function timeDefault ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	return date('H:i', $timestamp);
    }

    public static function timeDuration ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	$minutes = date('i', $timestamp);
    	if (strpos($minutes, '0') === 0) {
    		$minutes = substr($minutes, 1);
    	}
    	return date('G', $timestamp).'h '.$minutes.'m';
    }

    public static function dateDefault ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	return date('d-m-Y', $timestamp);
    }

    public static function dateTable ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	return date('d-m-Y', $timestamp);
    }

    public static function dateList ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	return date('d F Y', $timestamp);
    }

    public static function dateItem ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
    	return date('d F Y', $timestamp);
    }

    public static function dateTimeTable ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
        return date('d-m-Y, H:i', $timestamp);
    }

    public static function dateTimeItem ($timestamp = null) {
        if (!$timestamp) {
            $timestamp = time();
        } else {
            $timestamp = strtotime($timestamp);
        }
        return date('d F Y, H:i', $timestamp);
    }
}
?>
