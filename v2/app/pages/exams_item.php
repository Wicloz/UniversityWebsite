<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $item = Queries::exam(Input::get('id'));
    if (empty($item)) {
        Redirect::error(404);
    }
    $item = Queries::parseExam($item);
    $smarty->assign('item', $item);
    $smarty->assign('table_parentT', 'exams');
    $smarty->assign('table_parentI', $item->id);
    $smarty->assign('planning', Tables::planning(true, 'exams', $item->id));
    return $smarty;
}
?>
