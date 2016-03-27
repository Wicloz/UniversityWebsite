<?php
function createPage ($smarty) {
    $data = DB::instance()->get("navigation", array("name", "=", "Home"));
    $smarty->assign('test', $data->error());
    return $smarty;
}
?>
