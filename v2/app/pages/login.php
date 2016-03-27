<?php
function createPage ($smarty) {
    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'register') {
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

            }
            else {
                $smarty->assign('errors', $validate->getErrors());
            }
        }

        if (Input::get('action') === 'login') {
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
        }
    }

    $smarty->assign('token', Token::generate());
    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('name', Input::get('name'));
    return $smarty;
}
?>
