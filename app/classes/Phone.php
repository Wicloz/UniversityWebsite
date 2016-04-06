<?php
class Phone {
    private static $_client = null;

    public static function init () {
        $sid = "AC45051091c1437e8c03b5151fc2487029";
        $token = "9c3e5fe94047edd008664ef25649de4b";
        self::$_client = new Lookups_Services_Twilio($sid, $token);
    }

    private static function addCountryCode ($number) {
        if (strpos($number, '+') === false) {
            return '+31'.$number;
        }
        return $number;
    }

    public static function validNumber ($number) {
        $number = addCountryCode($number);
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
        $number = addCountryCode($number);
        /*$phone = self::$_client->phone_numbers->get($number);
        if (@$phone->phone_number) {
            return $phone->phone_number;
        }
        return '';*/
        return $number;
    }

    public static function formatFancy ($number) {
        $number = addCountryCode($number);
        /*$phone = self::$_client->phone_numbers->get($number);
        if (@$phone->national_format) {
            return $phone->national_format;
        }
        return '';*/
        return $number;
    }
}
?>
