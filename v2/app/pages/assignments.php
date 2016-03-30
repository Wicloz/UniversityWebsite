<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $smarty->assign('assignments', Tables::assignments(true));
    return $smarty;
}
?>
