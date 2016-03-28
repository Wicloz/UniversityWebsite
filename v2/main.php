<?php
function pageAddMain ($smarty) {
    $smarty->assign('loggedIn', User::loggedIn());
    if (User::loggedIn()) {
        $smarty->assign('user_name', User::currentData()->name);
    }

    $smarty->assign('topnav', topnav($_GET));
    $smarty->assign('sidenav', sidenav($_GET));

    return $smarty;
}

function pageAddMessages ($smarty) {
    $smarty->assign('successes', Session::flashRead('successes'));
    $smarty->assign('infos', Session::flashRead('info'));
    $smarty->assign('warnings', Session::flashRead('warnings'));
    $smarty->assign('errors', Session::flashRead('errors'));
    return $smarty;
}
?>
