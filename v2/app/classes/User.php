<?php
class User {
    private $_db;

    public function __construct ($user = null) {
        $this->_db = DB::instance();
    }

    public function create ($data = array()) {
        $result = $this->_db->insert("users", $data);
        if ($result->error()) {
            throw new Exception('There was a problem creating this account: '.$result->error());
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
                'min' => 4
            ),
            'password_again' => array(
                'name' => 'Repeat Password',
                'required' => true,
                'matches' => 'password'
            )
        ));

        if ($validate->passed()) {
            $user = new User();
            try {
                $salt = Hash::generateSalt(32);
                $user->create(array(
                    'name' => Input::get('name'),
                    'student_id' => Input::get('sid'),
                    'password' => Hash::createHash(Input::get('password'), $salt),
                    'salt' => $salt,
                    'permission_group' => 0,
                    'joined' => date('Y-m-d H:i:s')
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        else {
            $smarty->assign('errors', $validate->getErrors());
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

        }

        else {
            $smarty->assign('errors', $validate->getErrors());
        }

        return $smarty;
    }
}
?>
