<?php
$allowCaching = true;
function createPage ($smarty) {
    $smarty->assign('shedule_google', Queries::article('schedule'));
    $smarty->assign('shedule_begin', Queries::article('schedule_2ejrnaj'));
    $smarty->assign('shedule_end', Queries::article('schedule_2ejrvoorj'));
    return $smarty;
}
?>
