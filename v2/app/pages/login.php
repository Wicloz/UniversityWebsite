<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (Users::loggedIn()) {
        Redirect::to('?page=profile');
    }

    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'register') {
            $validate = new Validate();
            $validate->check($_POST, array_merge(Config::get('validation/register_info'), Config::get('validation/set_password')));

            if ($validate->passed()) {
                try {
                    Users::create(array(
                        'student_id' => Input::get('sid'),
                        'password' => Hash::hashPassword(Input::get('password')),
                        'permission_group' => 1,
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'umail' => Input::get('sid').'@umail.leidenuniv.nl',
                        'phone' => Input::get('phone'),
                        'joined' => date('Y-m-d H:i:s')
                    ));

                    Users::login(Input::get('sid'), Input::get('password'));

                    Session::addSuccess('You have been succesfully registered!');
                    Redirect::to('?page=profile');
                } catch(Exception $e) {
                    Session::addError($e->getMessage());
                }
            }

            else {
                Session::addErrorArray($validate->getErrors());
            }
        }

        if (Input::get('action') === 'login') {
            $validate = new Validate();
            $validate->check($_POST, Config::get('validation/login'));

            if ($validate->passed()) {
                $login = Users::login(Input::get('sid'), Input::get('password'), Input::getCheck('remember'));

                if ($login) {
                    Session::addSuccess('You have been logged in!');
                    Redirect::to('?page=profile');
                } else {
                    Session::addError('Invalid student number or password.');
                }
            }

            else {
                Session::addErrorArray($validate->getErrors());
            }
        }
    }

    $smarty->assign('remember', Input::getCheck('remember'));

    $smarty->assign('name', Input::get('name'));
    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('email', Input::get('email'));
    $smarty->assign('phone', Input::get('phone'));
    return $smarty;
}
?>
