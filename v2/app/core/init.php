<?php
require_once 'dbsettings.php';
error_reporting(E_ALL);
session_start();
date_default_timezone_set('Europe/Amsterdam');

$GLOBALS['config'] = array(
    'debug' => array(
        'debug' => true,
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
                'wildcard' => '*@*.*'
            ),
            'phone' => array(
                'name' => 'Mobile/Phone Number',
                'max' => 14
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
                'wildcard' => '*@*.*'
            ),
            'phone' => array(
                'name' => 'Mobile/Phone Number',
                'max' => 14
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

function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return true;
    }

    switch ($errno) {
        case E_USER_ERROR:
            Session::addError("[{$errno}] {$errstr}");
            echo "<br />";
            echo "<b>ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;

        default:
            Session::addWarning("[{$errno}] {$errstr} in file $errfile on line $errline");
            break;
    }

    return true;
}
#set_error_handler("customErrorHandler");

require_once 'app/functions/sanitize.php';
require_once 'app/functions/misc.php';
require_once 'app/functions/navigation.php';

if (Config::get('debug/debug')) {
    Session::addInfo('PHP Version: ' . PHP_VERSION);
    Session::addInfo('Current Time: ' . date('H:i:s'));
}

Users::init();
if (Cookie::exists(Config::get('remember/cookie_name')) && !Users::loggedIn()) {
    $cookieHash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::instance()->get("user_sessions", array("", "hash", "=", $cookieHash));
    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        Users::forceLogin($user, true);
    }
}
if (Users::loggedIn()) {
    Users::currentUser()->update(array('last_online' => DateFormat::sql()));
}
?>
