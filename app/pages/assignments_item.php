<?php
$allowCaching = false;
function createPage ($smarty) {
    $item = Queries::assignmentWithId(Input::get('id'));
    if (empty($item->id)) {
        Redirect::error(404);
    }

    $smarty->assign('item', $item);
    $smarty->assign('table_parentT', 'assignments');
    $smarty->assign('table_parentI', $item->id);
    $smarty->assign('planning', Tables::planning(true, 'assignments', $item->id));
    return $smarty;
}
?>
