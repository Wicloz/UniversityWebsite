<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'logout') {
            $user = new User();
            if ($user->isLoggedIn()) {
                $user->logout();
                Session::addSuccess('You have been logged out!');
                Redirect::to('?page=login');
            }
        }
    }

    $smarty->assign('token', Token::generate());
    return $smarty;
}
?>
