<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'register') {
            Users::tryRegister();
        }
        if (Input::get('action') === 'login') {
            Users::tryLogin();
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
