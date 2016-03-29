<?php
class Users {
    private static $_currentUser = null;

    public static function init () {
        self::$_currentUser = new User();
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

    public static function forceLogin ($user = null, $remember = false) {
        if ($user->exists()) {
            DB::instance()->delete("user_sessions", array("", "user_id", "=", $user->id()));
            Session::put(Config::get('session/loggedId'), $user->id());

            if ($remember) {
                $hash = Hash::hashUnique();
                DB::instance()->insert("user_sessions", array(
                    'user_id' => $user->id(),
                    'hash' => $hash
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
        DB::instance()->delete("user_sessions", array("", "user_id", "=", Session::get(Config::get('session/loggedId'))));
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

    public static function tryRegister () {
        $validate = new Validate();
        $validate->check($_POST, array_merge(Config::get('validation/register_info'), Config::get('validation/set_password')));

        if ($validate->passed()) {
            try {
                self::create(array(
                    'student_id' => Input::get('sid'),
                    'password' => Hash::hashPassword(Input::get('password'), Hash::generateSalt()),
                    'permission_group' => 0,
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'umail' => Input::get('sid').'@umail.leidenuniv.nl',
                    'phone' => Input::get('phone'),
                    'joined' => date('Y-m-d H:i:s')
                ));

                self::login(Input::get('sid'), Input::get('password'));

                Session::addSuccess('You have been succesfully registered!');
                Redirect::to('?page=profile');
            } catch(Exception $e) {
                Session::addError($e->getMessage());
            }
        }

        else {
            Session::addErrorArray($validate->getErrors());
        }
    }

    public static function tryLogin () {
        $validate = new Validate();
        $validate->check($_POST, Config::get('validation/login'));

        if ($validate->passed()) {
            $login = self::login(Input::get('sid'), Input::get('password'), Input::getCheck('remember'));

            if ($login) {
                Session::addSuccess('You have been logged in!');
                Redirect::to('?page=profile');
            } else {
                Session::addError('Invalid student number or password.');
            }
        }

        else {
            Session::addErrorArray($validate->getErrors());
        }
    }
}
?>
