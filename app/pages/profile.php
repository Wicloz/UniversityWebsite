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

        if (Input::get('action') === 'update_googleAuth') {
            $validation = new Validate();
            $validation->check($_POST, array(
                'authcode' => array(
                    'name' => 'Authorisation Code',
                    'required' => true
                )
            ));

            if ($validation->passed()) {
                if (Calendar::setCredentials(Input::get('authcode'))) {
                    Notifications::addSuccess('Google Calendar API authorized!');
                } else {
                    Notifications::addValidationFail('Could not authorize Google Calendar API.');
                }
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }

        if (Input::get('action') === 'update_calendarAssignmentsId') {
            $validation = new Validate();
            $validation->check($_POST, array(
                'calid-ass' => array(
                    'name' => 'Assignment Calendar ID',
                    'required' => false
                )
            ));

            if ($validation->passed()) {
                $data = array(
                    'calendar_assignments' => Input::get('calid-ass')
                );
                if (Users::currentUser()->update($data)) {
                    Notifications::addSuccess('Assignment calendar ID updated!');
                } else {
                    Notifications::addValidationFail('Could not update assignment calendar ID.');
                }
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }

        if (Input::get('action') === 'delete_googleAuth') {
            Calendar::deleteCredentials();
        }

        if (Input::get('action') === 'update_calendarEvents') {
            $assignments = DB::instance()->get("assignments");
            foreach ($assignments as $assignment) {
                Calendar::updateAssignment($assignment->id);
            }
        }
    }

    if (!Calendar::getService()) {
        $smarty->assign('authUrl', Calendar::getAuthUrl());
    }
    $smarty->assign('authCode', Input::get('authcode'));
    $smarty->assign('calid_ass', Users::currentData()->calendar_assignments);

    $smarty->assign('name', Users::currentData()->name);
    $smarty->assign('sid', Users::currentData()->student_id);
    $smarty->assign('email', Users::currentData()->email);
    $smarty->assign('phone', Users::currentData()->phone);
    return $smarty;
}
?>
