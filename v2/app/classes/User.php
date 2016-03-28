<?php
class User {
    private $_db,
            $_sessionId,
            $_sessionLogged,
            $_userdata = null,
            $_loggedIn = false;

    public function __construct ($user = null) {
        $this->_db = DB::instance();
        $this->_sessionId = Config::get('session/loggedIn_id');
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

    public function login ($userid = '', $password = '') {
        if (!empty($userid) && !empty($password) && $this->find($userid)) {
            $this->_loggedIn = false;
            if (Hash::checkPassword($password, $this->data()->password)) {
                Session::put($this->_sessionId, $this->data()->id);
                Session::put($this->_sessionLogged, true);
                $this->_loggedIn = true;
                return true;
            }
        }
        return false;
    }

    public function data () {
        return $this->_userdata;
    }

    public static function loggedIn () {
        return (Session::get(Config::get('session/loggedIn')) === true) ? true : false;
    }

    public static function logout () {
        Session::delete(Config::get('session/loggedIn_id'));
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
        $validate->check($_POST, array(
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
            ),
            'email' => array(
                'name' => 'Email Address',
                'wildcard' => '*@*.*'
            ),
            'phone' => array(
                'name' => 'Mobile/Phone Number',
                'max' => 14
            )
        ));

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
        $validate->check($_POST, array(
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
        ));

        if ($validate->passed()) {
            $user = new User();
            $login = $user->login(Input::get('sid'), Input::get('password'));

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
