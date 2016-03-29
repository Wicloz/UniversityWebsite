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
                Session::addSuccess('You have been logged out!');
                Redirect::to('?page=login');
            }
        }

        if (Input::get('action') === 'update_info') {
            $validate = new Validate();
            $validate->check($_POST, Config::get('validation/user_info'));

            if ($validate->passed()) {
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
                    Session::addSuccess('User information updated!');
                } else {
                    Session::addError('Could not update user information.');
                }
            }

            else {
                Session::addErrorArray($validate->getErrors());
            }
        }

        if (Input::get('action') === 'update_pass') {
            $validate = new Validate();
            $validate->check($_POST, array_merge(Config::get('validation/set_password'), array(
                'password_current' => array(
                    'name' => 'Current Password',
                    'required' => true,
                    'max' => 72
                )
            )));

            if ($validate->passed()) {
                if (Hash::checkPassword(Input::get('password_current'), Users::currentData()->password)) {
                    if (Users::currentUser()->update(array('password' => Hash::hashPassword(Input::get('password'))))) {
                        Session::addSuccess('Password changed!');
                    } else {
                        Session::addError('Could not change password.');
                    }
                } else {
                    Session::addError('Invalid current password.');
                }

            }

            else {
                Session::addErrorArray($validate->getErrors());
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
