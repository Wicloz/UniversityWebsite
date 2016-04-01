<?php
function pageAddMain ($smarty) {
    $smarty->assign('loggedIn', Users::loggedIn());
    if (Users::loggedIn()) {
        $smarty->assign('user_name', Users::currentData()->name);
    }

    $smarty->assign('token', Token::generate());
    $smarty->assign('topnav', topnav($_GET));
    $smarty->assign('sidenav', sidenav($_GET));

    return $smarty;
}

function pageAddMessages ($smarty) {
    if (Config::get('debug/debug')) {
        Session::addInfo('PHP Version: ' . PHP_VERSION);
        Session::addInfo('Current Time: ' . date('H:i:s'));
    }
    $smarty->assign('successes', Session::flashRead('successes'));
    $smarty->assign('infos', Session::flashRead('info'));
    $smarty->assign('warnings', Session::flashRead('warnings'));
    $smarty->assign('errors', Session::flashRead('errors'));
    return $smarty;
}
?>
