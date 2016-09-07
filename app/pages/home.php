<?php
$allowCaching = false;
function createPage ($smarty) {
    $smarty->assign('introduction', Queries::article('introduction'));
    $smarty->assign('today', Tables::today());
    $smarty->assign('planning', Tables::planning(false));
    $smarty->assign('events', Tables::events(false));
    $smarty->assign('schedule', Queries::article('agenda'));
    return $smarty;
}
?>
