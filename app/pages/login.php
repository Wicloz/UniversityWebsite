<?php
$allowCaching = false;
function createPage ($smarty) {
    if (Users::loggedIn()) {
        Redirect::to('?page=profile');
    }

    if (Input::exists()) {
        if (Input::get('action') === 'register') {
            $validation = new Validate();
            $validation->check($_POST, array_merge(Config::get('validation/register_info'), Config::get('validation/set_password')));

            if ($validation->passed()) {
                try {
                    Users::create(array(
                        'student_id' => Input::get('sid'),
                        'password' => Hash::hashPassword(Input::get('password')),
                        'permission_group' => 1,
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'umail' => Input::get('sid').'@umail.leidenuniv.nl',
                        'phone' => Phone::formatNumber(Input::get('phone')),
                        'joined' => DateFormat::sql()
                    ));

                    Users::login(Input::get('sid'), Input::get('password'));

                    Notifications::addSuccess('You have been succesfully registered!');
                    Redirect::to('?page=profile');
                } catch (Exception $e) {
                    Notifications::addError($e->getMessage());
                }
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }

        if (Input::get('action') === 'login') {
            $validation = new Validate();
            $validation->check($_POST, Config::get('validation/login'));

            if ($validation->passed()) {
                $login = Users::login(Input::get('sid'), Input::get('password'), Input::getAsBool('remember'));

                if ($login) {
                    Notifications::addSuccess('You have been logged in!');
                    Redirect::to('?page=profile');
                } else {
                    Notifications::addValidationFail('Invalid student number or password.');
                }
            }

            else {
                Notifications::addValidationFail($validation->getErrors());
            }
        }
    }

    $smarty->assign('remember', Input::getAsBool('remember'));
    $smarty->assign('name', Input::get('name'));
    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('email', Input::get('email'));
    $smarty->assign('phone', Input::get('phone'));
    return $smarty;
}
?>
