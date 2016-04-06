<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (!Users::loggedIn()) {
        Redirect::to('?page=login');
    }

    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'logout') {
            if (Users::loggedIn()) {
                Users::logout();
                Notifications::addSuccess('You have been logged out!');
                Redirect::to('?page=login');
            }
        }

        if (Input::get('action') === 'update_info') {
            $validation = new Validate();
            $validation->check($_POST, Config::get('validation/user_info'));

            if ($validation->passed()) {
                $data = array(
                    'name' => Input::get('name'),
                    'student_id' => Input::get('sid'),
                    'email' => Input::get('email'),
                    'phone' => Phone::formatNumber(Input::get('phone'))
                );

                if (Users::currentUser()->update($data)) {
                    Notifications::addSuccess('User information updated!');
                } else {
                    Notifications::addError('Could not update user information.');
                }
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }

        if (Input::get('action') === 'update_pass') {
            $validation = new Validate();
            $validation->check($_POST, array_merge(Config::get('validation/set_password'), array(
                'password_current' => array(
                    'name' => 'Current Password',
                    'required' => true,
                    'max' => 72
                )
            )));

            if ($validation->passed()) {
                if (Hash::checkPassword(Input::get('password_current'), Users::currentData()->password)) {
                    if (Users::currentUser()->update(array('password' => Hash::hashPassword(Input::get('password'))))) {
                        Notifications::addSuccess('Password changed!');
                    } else {
                        Notifications::addError('Could not change password.');
                    }
                } else {
                    Notifications::addValidationFail('Invalid current password.');
                }

            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }
    }

    $smarty->assign('name', Users::currentData()->name);
    $smarty->assign('sid', Users::currentData()->student_id);
    $smarty->assign('email', Users::currentData()->email);
    $smarty->assign('phone', Users::currentData()->phone);
    return $smarty;
}
?>
