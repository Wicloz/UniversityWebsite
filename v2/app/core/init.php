<?php
require_once 'dbsettings.php';
session_start();

$GLOBALS['config'] = array(
    'smarty' => array(
        'caching' => false,
        'cache_lifetime' => 120
    ),

    'mysql' => array(
        'host' => $db_host,
        'username' => $db_username,
        'password' => $db_password,
        'db' => $db_dbname
    ),

    'remember' => array(
        'cookie_name' => 's1704362_univ_hash',
        'cookie_expiry' => 604800
    ),

    'session' => array(
        'loggedIn' => 's1704362_univ_loggedIn',
        'loggedIn_id' => 's1704362_univ_userId',
        'token_name' => 's1704362_univ_token'
    )
);

spl_autoload_register(function($class) {
    require_once 'app/classes/' . $class . '.php';
});

require_once 'app/functions/sanitize.php';
require_once 'app/functions/misc.php';
require_once 'app/functions/queries.php';
require_once 'app/functions/navigation.php';
?>
