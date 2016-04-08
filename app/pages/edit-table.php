<?php
$allowCaching = false;
function createPage ($smarty) {
    if (!Users::isAdmin()) {
        Redirect::error(403);
    }

    $smarty->assign('edit_headers', Queries::itemListHeaders(Input::get('table')));
    $smarty->assign('edit_table', Queries::itemList(Input::get('table')));
    return $smarty;
}
?>
