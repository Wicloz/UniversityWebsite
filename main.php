<?php
function pageAddMain ($smarty) {
    $smarty->assign('loggedIn', Users::loggedIn());
    $smarty->assign('user_sid', Users::safeSid());
    $smarty->assign('show_sid', Users::showSid());
    if (Users::loggedIn()) {
        $smarty->assign('user_name', Users::currentData()->name);
    }

    $smarty->assign('topnav', Navigation::topnav($_GET));
    $smarty->assign('sidenav', Navigation::sidenav($_GET));

    return $smarty;
}

function pageAddMessages ($smarty) {
    if (Config::get('debug/debug')) {
        Notifications::addDebug('PHP Version: ' . PHP_VERSION, true);
        Notifications::addDebug('Current Time: ' . date('H:i:s'), true);
        Notifications::addDebug(Notifications::getAsJson(), true);
    }
    $smarty->assign('notifications_success', Session::flashRead('notifications-success'));
    $smarty->assign('notifications_info', Session::flashRead('notifications-info'));
    $smarty->assign('notifications_warning', Session::flashRead('notifications-warning'));
    $smarty->assign('notifications_error', Session::flashRead('notifications-error'));
    $smarty->assign('alerts_success', Session::flashRead('alerts-success'));
    $smarty->assign('alerts_info', Session::flashRead('alerts-info'));
    $smarty->assign('alerts_warning', Session::flashRead('alerts-warning'));
    $smarty->assign('alerts_error', Session::flashRead('alerts-error'));
    return $smarty;
}
?>
