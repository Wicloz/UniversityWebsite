<?php
function createPage ($smarty) {
    DB::instance()->query("asdasd");

    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'register') {
            $smarty = User::tryRegister($smarty);
        }

        if (Input::get('action') === 'login') {
            $smarty = User::tryLogin($smarty);
        }
    }

    $smarty->assign('token', Token::generate());
    $smarty->assign('sid', Input::get('sid'));
    $smarty->assign('name', Input::get('name'));
    return $smarty;
}
?>
