<?php
class User {
    private $_db,
            $_sessionId,
            $_sessionLogged,
            $_userdata = null,
            $_loggedIn = false;

    public function __construct ($user = null) {
        $this->_db = DB::instance();
        $this->_sessionId = Config::get('session/loggedId');
        $this->_sessionLogged = Config::get('session/loggedIn');

        if (!$user) {
            if (Session::exists($this->_sessionId)) {
                if ($this->find(Session::get($this->_sessionId))) {
                    $this->_loggedIn = true;
                } else {
                    $this->logout();
                }
            }
        }

        else {
            $this->find($user);
        }
    }

    public function find ($userid = '') {
        $field = (is_numeric($userid)) ? 'id' : 'student_id';
        $data = $this->_db->get("users", array("", $field, "=", $userid));

        if ($data->count()) {
            $this->_userdata = $data->first();
            return true;
        }

        return false;
    }

    public function forceLogin ($remember = false) {
        if ($this->dataExists()) {
            DB::instance()->delete("user_sessions", array("", "user_id", "=", $this->data()->id));
            Session::put($this->_sessionId, $this->data()->id);
            Session::put($this->_sessionLogged, true);
            $this->_loggedIn = true;

            if ($remember) {
                $hash = Hash::hashUnique();
                $this->_db->insert("user_sessions", array(
                    'user_id' => $this->data()->id,
                    'hash' => $hash
                ));
                Cookie::put(Config::get('remember/cookie_name'), $hash, Config::get('remember/cookie_expiry'));
            }
        }
    }

    public function login ($userid = '', $password = '', $remember = false) {
        if (!empty($userid) && !empty($password) && $this->find($userid)) {
            $this->_loggedIn = false;
            if (Hash::checkPassword($password, $this->data()->password)) {
                $this->forceLogin ($remember);
                return true;
            }
        }
        return false;
    }

    public function update ($data = array(), $id = null) {
        if ($this->_loggedIn) {
            if (!$id) {
                $id = $this->data()->id;
            }
            $this->_db->update("users", $id, $data);
        }
    }

    public function data () {
        return $this->_userdata;
    }

    public function dataExists () {
        return !empty($this->_userdata);
    }

    public static function loggedIn () {
        return (Session::get(Config::get('session/loggedIn')) === true) ? true : false;
    }

    public static function logout () {
        DB::instance()->delete("user_sessions", array("", "user_id", "=", Session::get(Config::get('session/loggedId'))));
        Cookie::delete(Config::get('remember/cookie_name'));
        Session::delete(Config::get('session/loggedId'));
        Session::delete(Config::get('session/loggedIn'));
    }

    public static function currentData () {
        $user = new User();
        return $user->data();
    }

    public static function create ($data = array()) {
        $result = DB::instance()->insert("users", $data);
        if ($result->error()) {
            throw new Exception('There was an unexpected problem creating the account: '.$result->error());
        }
    }

    public static function tryRegister () {
        $validate = new Validate();
        $validate->check($_POST, array_merge(Config::get('validation/register_info'), Config::get('validation/password')));

        if ($validate->passed()) {
            try {
                $salt = Hash::generateSalt();
                User::create(array(
                    'student_id' => Input::get('sid'),
                    'password' => Hash::hashPassword(Input::get('password'), $salt),
                    'salt' => $salt,
                    'permission_group' => 0,
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'umail' => Input::get('sid').'@umail.leidenuniv.nl',
                    'phone' => Input::get('phone'),
                    'joined' => date('Y-m-d H:i:s')
                ));

                $user = new User();
                $user->login(Input::get('sid'), Input::get('password'));

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
            $user = new User();
            $remember = (Input::get('remember') == true) ? true : false;
            $login = $user->login(Input::get('sid'), Input::get('password'), $remember);

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
