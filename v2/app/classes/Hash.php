<?php
class Hash {
    public static function hashString ($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    public static function generateSalt () {
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $salt = base64_encode($salt);
        $salt = str_replace('+', '.', $salt);
        return $salt;
    }

    public static function hashPassword ($password, $salt) {
        return crypt($password, '$2y$10$'.$salt.'$');
    }

    public static function createUnique () {
        return self::hashString(uniqid());
    }
}
?>
