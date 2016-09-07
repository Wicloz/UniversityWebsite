<?php
class Hash {
    public static function hashString ($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function generateSalt () {
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $salt = substr(base64_encode($salt), 0, 22);
        $salt = str_replace('+', '.', $salt);
        return $salt;
    }

    public static function hashPassword ($password) {
        return crypt($password, '$2y$10$'.self::generateSalt().'$');
    }

    public static function checkPassword ($password, $hash) {
        return crypt($password, $hash) === $hash;
    }

    public static function hashUnique () {
        return self::hashString(uniqid(), self::generateSalt());
    }
}
?>
