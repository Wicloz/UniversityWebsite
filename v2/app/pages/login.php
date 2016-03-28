<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'register') {
            $smarty = User::tryRegister();
        }
        if (Input::get('action') === 'login') {
            $smarty = User::tryLogin();
        }
    }

    $smarty->assign('token', Token::generate());
    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('name', Input::get('name'));
    $smarty->assign('email', Input::get('email'));
    $smarty->assign('phone', Input::get('phone'));
    return $smarty;
}
?>
