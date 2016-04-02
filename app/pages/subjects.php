<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $subject = DB::instance()->get('subjects', array("", "abbreviation", "=", Input::get('subject')))->first();
    if (empty($subject)) {
        Redirect::error(404);
    }
    $smarty->assign('subject', $subject);
    $smarty->assign('events', Tables::events(true, $subject->name));
    $smarty->assign('table_parentT', 'subjects');
    $smarty->assign('table_parentI', $subject->id);
    $smarty->assign('planning', Tables::planning(true, 'subjects', $subject->id));
    return $smarty;
}
?>