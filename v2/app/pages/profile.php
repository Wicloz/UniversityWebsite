<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (!User::loggedIn()) {
        Redirect::to('?page=login');
    }

    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'logout') {
            if (User::loggedIn()) {
                User::logout();
                Session::addSuccess('You have been logged out!');
                Redirect::to('?page=login');
            }
        }

        if (Input::get('action') === 'update_info') {
            $validate = new Validate();
            $validate->check($_POST, Config::get('validation/user_info'));

            if ($validate->passed()) {
                $user = new User();
                $fields = array('name', 'email', 'phone');

                foreach ($fields as $value) {
                    if (!empty(Input::get($value))) {
                        $user->update(array($value => Input::get($value)));
                    }
                }
                if (!empty(Input::get('sid'))) {
                    $user->update(array('student_id' => Input::get('sid')));
                }

                Session::addSuccess('User information updated!');
            }

            else {
                Session::addErrorArray($validate->getErrors());
            }
        }
    }

    $smarty->assign('name', User::currentData()->name);
    $smarty->assign('sid', User::currentData()->student_id);
    $smarty->assign('email', User::currentData()->email);
    $smarty->assign('phone', User::currentData()->phone);
    return $smarty;
}
?>
