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
        'cookie_name' => 's1704362univ_remember',
        'cookie_expiry' => 604800
    ),

    'session' => array(
        'loggedId' => 's1704362univ_userId',
        'token_name' => 's1704362univ_token'
    ),

    'validation' => array(
        'user_info' => array(
            'name' => array(
                'name' => 'Username',
                'min' => 1,
                'max' => 50
            ),
            'sid' => array(
                'name' => 'Student Number',
                'wildcard' => 's???????'
            ),
            'email' => array(
                'name' => 'Email Address',
                'ofType' => array('email')
            ),
            'phone' => array(
                'name' => 'Mobile/Phone Number',
                'max' => 14,
                'ofType' => array('phone')
            )
        ),
        'register_info' => array(
            'name' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 1,
                'max' => 50
            ),
            'sid' => array(
                'name' => 'Student Number',
                'required' => true,
                'wildcard' => 's???????',
                'unique' => 'users/student_id'
            ),
            'email' => array(
                'name' => 'Email Address',
                'ofType' => array('email')
            ),
            'phone' => array(
                'name' => 'Mobile/Phone Number',
                'max' => 14,
                'ofType' => array('phone')
            )
        ),
        'set_password' => array(
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 4,
                'max' => 72
            ),
            'password_again' => array(
                'name' => 'Repeat Password',
                'required' => true,
                'matches' => 'password'
            )
        ),
        'login' => array(
            'sid' => array(
                'name' => 'Student Number',
                'required' => true,
                'wildcard' => 's???????'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'max' => 72
            )
        )
    )
);

spl_autoload_register(function($class) {
    require_once 'app/classes/' . $class . '.php';
});

require_once 'app/functions/sanitize.php';
require_once 'app/functions/misc.php';
Users::init();
Phone::init();
?>
