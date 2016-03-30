<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $smarty->assign('exams', Tables::exams(true));
    return $smarty;
}
?>
