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
                Session::addSuccess('You have been logged out!', false);
                Redirect::to('?page=login');
            }
        }

        if (Input::get('action') === 'update_info') {
            $validation = new Validate();
            $validation->check($_POST, Config::get('validation/user_info'));

            if ($validation->passed()) {
                $fields = array(
                    'name' => 'name',
                    'student_id' => 'sid',
                    'email' => 'email',
                    'phone' => 'phone'
                );
                $data = array();

                foreach ($fields as $field => $value) {
                    if (Input::has($value)) {
                        $data[$field] = Input::get($value);
                    }
                }

                if (Users::currentUser()->update($data)) {
                    Session::addSuccess('User information updated!', false);
                } else {
                    Session::addError('Could not update user information.', true);
                }
            }

            else {
                Session::addErrorArray($validation->getErrors(), true);
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
                        Session::addSuccess('Password changed!', false);
                    } else {
                        Session::addError('Could not change password.', true);
                    }
                } else {
                    Session::addError('Invalid current password.', true);
                }

            }

            else {
                Session::addErrorArray($validation->getErrors(), true);
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
