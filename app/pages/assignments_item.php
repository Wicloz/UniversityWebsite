<?php
$allowCaching = false;
function createPage ($smarty) {
    $item = Queries::assignment(Input::get('id'));
    if (empty($item)) {
        Redirect::error(404);
    }
    $item = Queries::parseAssignment($item);
    $smarty->assign('item', $item);
    $smarty->assign('table_parentT', 'assignments');
    $smarty->assign('table_parentI', $item->id);
    $smarty->assign('planning', Tables::planning(true, 'assignments', $item->id));
    return $smarty;
}
?>
