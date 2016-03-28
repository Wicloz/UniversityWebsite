<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (!User::loggedIn()) {
        Redirect::to('?page=login');
    }

    if (Input::exists() && Token::check(Input::get('token'))) {
        if (Input::get('action') === 'logout') {
            if (User::loggedIn()) {
                User::logout();
                Session::addSuccess('You have been logged out!');
                Redirect::to('?page=login');
            }
        }
    }
    
    return $smarty;
}
?>
