<?php
$allowCaching = true;
function createPage ($smarty) {
    $smarty->assign('shedule_google', Queries::article('schedule'));
    $smarty->assign('shedule_begin', Queries::article('schedule_1ejrnaj'));
    $smarty->assign('shedule_end', Queries::article('schedule_1ejrvoorj'));
    return $smarty;
}
?>
