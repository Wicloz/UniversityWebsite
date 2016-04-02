<?php
$pageHasRandom = false;
function createPage ($smarty) {
    if (!Users::isAdmin()) {
        Redirect::error(403);
    }

    if (Input::exists() && Token::check(Input::get('token')) && Input::get('action') === 'admin_item_insert') {
        Update::adminInsertItem();
    }
    if (Input::exists() && Token::check(Input::get('token')) && Input::get('action') === 'admin_item_update') {
        Update::adminUpdateItem();
    }
    if (Input::exists() && Token::check(Input::get('token')) && Input::get('action') === 'admin_item_delete') {
        Update::adminDeleteItem();
    }

    $smarty->assign('columns', Queries::editableEntry(Input::get('table'), Input::get('id')));
    return $smarty;
}
?>
