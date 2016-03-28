<?php
class Hash {
    public static function createHash ($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function generateSalt ($length) {
        return mcrypt_create_iv($length);
    }

    public static function createUnique () {
        return self::make(uniqid());
    }
}
?>
