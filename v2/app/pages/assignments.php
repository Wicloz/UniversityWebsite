<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $smarty->assign('assignments', Tables::assignments(true));
    $smarty->assign('planning', Tables::planning(true, 'assignments'));
    return $smarty;
}
?>
