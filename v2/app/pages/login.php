<?php
function createPage ($smarty) {
    if (Input::get('action') === 'register' && Input::exists()) {
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

    if (Input::get('action') === 'login' && Input::exists()) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'sid' => array(
                'name' => 'Student Number',
                'required' => true,
                'min' => 8,
                'max' => 8
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

    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('name', Input::get('name'));
    return $smarty;
}
?>
