<?php
require_once 'dbsettings.php';
session_start();

$GLOBALS['config'] = array(
    'php' => array(
        'debug' => true
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

require_once 'app/functions/sanitize.php';
require_once 'app/functions/misc.php';
require_once 'app/functions/navigation.php';

Users::init();
if (Cookie::exists(Config::get('remember/cookie_name')) && !Users::loggedIn()) {
    $cookieHash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::instance()->get("user_sessions", array("", "hash", "=", $cookieHash));
    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        Users::forceLogin($user, true);
    }
}
?>
