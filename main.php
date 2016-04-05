<?php
function pageAddMain ($smarty) {
    $smarty->assign('loggedIn', Users::loggedIn());
    if (Users::loggedIn()) {
        $smarty->assign('user_name', Users::currentData()->name);
    }

    $smarty->assign('token', Token::generate());
    $smarty->assign('topnav', Navigation::topnav($_GET));
    $smarty->assign('sidenav', Navigation::sidenav($_GET));

    return $smarty;
}

function pageAddMessages ($smarty) {
    if (Config::get('debug/debug')) {
        Navigation::addDebug('PHP Version: ' . PHP_VERSION, true);
        Navigation::addDebug('Current Time: ' . date('H:i:s'), true);
    }
    $smarty->assign('not_success', Session::flashRead('notifications-success'));
    $smarty->assign('not_info', Session::flashRead('notifications-info'));
    $smarty->assign('not_warning', Session::flashRead('notifications-warning'));
    $smarty->assign('not_error', Session::flashRead('notifications-error'));
    $smarty->assign('alerts_success', Session::flashRead('alerts-success'));
    $smarty->assign('alerts_info', Session::flashRead('alerts-info'));
    $smarty->assign('alerts_warning', Session::flashRead('alerts-warning'));
    $smarty->assign('alerts_error', Session::flashRead('alerts-error'));
    return $smarty;
}
?>
