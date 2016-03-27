<?php
function createPage ($smarty) {
    $data = DB::instance();
    $smarty->assign('test', Config::get('mysql/username'));
    return $smarty;
}
?>
