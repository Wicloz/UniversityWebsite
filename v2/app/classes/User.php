<?php
class User {
    private $_db;

    public function __construct ($user = null) {
        $this->_db = DB::instance();
    }

    public function create ($data = array()) {
        $result = $this->_db->insert("users", $data);
        if ($result->error()) {
            throw new Exception('There was an unexpected problem creating this account: '.$result->error());
        }
    }

    public static function tryRegister ($smarty) {
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
            $user = new User();
            try {
                $salt = Hash::generateSalt();
                $user->create(array(
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
                Session::addSuccess('You have been succesfully registered!');
            } catch(Exception $e) {
                Session::addError($e->getMessage());
            }
        }

        else {
            Session::addErrorArray($validate->getErrors());
        }

        return $smarty;
    }

    public static function tryLogin ($smarty) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'sid' => array(
                'name' => 'Student Number',
                'required' => true,
                'wildcard' => 's???????'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true
            )
        ));

        if ($validate->passed()) {
            Session::addSuccess('You have been logged in!');
        }

        else {
            Session::addErrorArray($validate->getErrors());
        }

        return $smarty;
    }
}
?>
