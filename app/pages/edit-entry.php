<?php
$allowCaching = false;
function createPage ($smarty) {
    if (!Users::isAdmin()) {
        Redirect::error(403);
    }

    if (Input::exists() && Input::get('action') === 'admin_item_insert') {
        Update::adminInsertItem();
    }
    if (Input::exists() && Input::get('action') === 'admin_item_update') {
        Update::adminUpdateItem();
    }
    if (Input::exists() && Input::get('action') === 'admin_item_delete') {
        Update::adminDeleteItem();
    }

    $smarty->assign('columns', Queries::editableEntry(Input::get('table', 'get'), Input::get('id', 'get')));
    return $smarty;
}
?>
