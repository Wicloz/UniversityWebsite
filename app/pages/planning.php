<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $smarty->assign('planning', Tables::planning(true));
    return $smarty;
}
?>
