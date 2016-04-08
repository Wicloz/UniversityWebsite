<?php
$allowCaching = false;
function createPage ($smarty) {
    $smarty->assign('exams', Tables::exams(true));
    $smarty->assign('planning', Tables::planning(true, 'exams'));
    $smarty->assign('schedule', Queries::article('exams'));
    return $smarty;
}
?>
