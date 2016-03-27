<?php
require_once 'dbsettings.php';
session_start();

$GLOBALS['config'] = array(
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
        'session_name' => 'user'
    )
);

spl_autoload_register(function($class) {
    require_once 'app/classes/' . $class . '.php';
});

require_once 'app/functions/sanitize.php';
require_once 'app/functions/navigation.php';
require_once 'app/db/interaction.php';
require_once 'app/includes/errors/errors.php';
?>
