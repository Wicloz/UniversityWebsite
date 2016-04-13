<?php
class Users {
    private static $_currentUser = null;

    public static function init () {
        self::$_currentUser = new User();
        DB::instance()->delete("user_sessions", array("", "expiry", "<", DateFormat::sql()));
        if (Cookie::exists(Config::get('remember/cookie_name')) && !Users::loggedIn()) {
            $cookieHash = Cookie::get(Config::get('remember/cookie_name'));
            $hashCheck = DB::instance()->get("user_sessions", array("", "hash", "=", $cookieHash));
            if ($hashCheck->count()) {
                $user = new User($hashCheck->first()->user_id);
                self::forceLogin($user, true);
            }
        }
        if (self::loggedIn()) {
            self::currentUser()->update(array('last_online' => DateFormat::sql()));
            UserTables::updateTables();
        }
    }

    public static function loggedIn () {
        return (!empty(self::$_currentUser) && self::$_currentUser->isLoggedIn());
    }

    public static function currentData () {
        return self::$_currentUser->data();
    }

    public static function currentUser () {
        return self::$_currentUser;
    }

    public static function safeSid () {
        if (self::loggedIn()) {
            return DB::escape(self::currentData()->student_id);
        }
        return 's0000000';
    }

    public static function showSid () {
        if (self::loggedIn() && !self::isGuest()) {
            return self::safeSid();
        }
        return 's1704362';
    }

    public static function isGuest () {
        return !self::isUser() && !self::isEditor() && !self::isAdmin();
    }

    public static function isUser () {
        return self::$_currentUser->hasPermission('user');
    }

    public static function isEditor () {
        return self::$_currentUser->hasPermission('editor');
    }

    public static function isAdmin () {
        return self::$_currentUser->hasPermission('admin');
    }

    public static function forceLogin ($user = null, $remember = false) {
        if ($user->exists()) {
            DB::instance()->delete("user_sessions", array("", "hash", "=", Cookie::get(Config::get('remember/cookie_name'))));
            Session::put(Config::get('session/loggedId'), $user->id());

            if ($remember) {
                $hash = Hash::hashUnique();
                DB::instance()->insert("user_sessions", array(
                    'user_id' => $user->id(),
                    'hash' => $hash,
                    'expiry' => DateFormat::sql(time() + Config::get('remember/cookie_expiry'))
                ));
                Cookie::put(Config::get('remember/cookie_name'), $hash, Config::get('remember/cookie_expiry'));
            }

            self::$_currentUser = new User();
        }
    }

    public static function login ($userid = '', $password = '', $remember = false) {
        $user = new User($userid);
        if (!empty($userid) && !empty($password) && $user->exists()) {
            if (Hash::checkPassword($password, $user->data()->password)) {
                self::forceLogin($user, $remember);
                return true;
            }
        }
        return false;
    }

    public static function logout () {
        DB::instance()->delete("user_sessions", array("", "hash", "=", Cookie::get(Config::get('remember/cookie_name'))));
        Cookie::delete(Config::get('remember/cookie_name'));
        Session::delete(Config::get('session/loggedId'));
        self::$_currentUser = new User();
    }

    public static function create ($data = array()) {
        $result = DB::instance()->insert("users", $data);
        if ($result->error()) {
            throw new Exception('There was an unexpected problem creating the account: '.$result->error().'.');
        }
    }
}
?>
