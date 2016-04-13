<?php
error_reporting(E_ALL);
require_once 'vendor/smarty/smarty/libs/Smarty.class.php';
require_once 'vendor/autoload.php';
require_once 'dbsettings.php';
session_start();
date_default_timezone_set('Europe/Amsterdam');

$GLOBALS['config'] = array(
    'debug' => array(
        'debug' => false,
        'smartyDebug' => false,
        'qrydump' => false
    ),

    'smarty' => array(
        'caching' => true,
        'cache_lifetime' => 120
    ),

    'mysql' => array(
        'host' => $db_host,
        'username' => $db_username,
        'password' => $db_password,
        'db' => $db_dbname
    ),

    'remember' => array(
        'cookie_name' => 'anime_remember',
        'cookie_expiry' => 604800
    ),

    'session' => array(
        'loggedId' => 'anime_userId',
        'token_name' => 'anime_token'
    ),

    'validation' => array(
    )
);

spl_autoload_register(function($class) {
    require_once 'app/classes/' . $class . '.php';
});

require_once 'app/functions/sanitize.php';
require_once 'app/functions/misc.php';
Users::init();
?>
