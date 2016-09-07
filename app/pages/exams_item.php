<?php
$allowCaching = false;
function createPage ($smarty) {
    $item = Queries::examWithId(Input::get('id', 'get'));
    if (empty($item->id)) {
        Redirect::error(404);
    }

    $smarty->assign('item', $item);
    $smarty->assign('table_parentT', 'exams');
    $smarty->assign('table_parentI', $item->id);
    $smarty->assign('planning', Tables::planning(true, 'exams', $item->id));
    return $smarty;
}
?>
