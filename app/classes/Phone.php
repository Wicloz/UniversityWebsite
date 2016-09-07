<?php
class Phone {
    private static $_client = null;

    public static function init () {
        self::$_client = new Lookups_Services_Twilio(Config::get('twilio/sid'), Config::get('twilio/token'));
    }

    private static function addCountryCode ($number) {
        if (strpos($number, '+') === false) {
            return '+31'.$number;
        }
        return $number;
    }

    public static function validNumber ($number) {
        $number = self::addCountryCode($number);
        /*$phone = self::$_client->phone_numbers->get($number);
        try {
            $phone->phone_number;
            return true;
        } catch (Exception $e) {
            if ($e->getStatus() == 404) {
                return false;
            } else {
                throw $e;
            }
        }*/
        return true;
    }

    public static function formatNumber ($number) {
        $number = self::addCountryCode($number);
        /*$phone = self::$_client->phone_numbers->get($number);
        if (@$phone->phone_number) {
            return $phone->phone_number;
        }
        return '';*/
        return $number;
    }

    public static function formatFancy ($number) {
        $number = self::addCountryCode($number);
        /*$phone = self::$_client->phone_numbers->get($number);
        if (@$phone->national_format) {
            return $phone->national_format;
        }
        return '';*/
        return $number;
    }
}
?>
