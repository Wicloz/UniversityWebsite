<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $subject = DB::instance()->get('subjects', array("", "abbreviation", "=", Input::get('subject')))->first();

    $smarty->assign('subject_name', $subject->name);
    $smarty->assign('subject_content', $subject->content);
    $smarty->assign('subject_id', $subject->id);

    $smarty->assign('link_home', $subject->link_home);
    $smarty->assign('link_schedule', $subject->link_schedule);
    $smarty->assign('link_powerpoints', $subject->link_powerpoints);
    $smarty->assign('link_assignments', $subject->link_assignments);
    $smarty->assign('link_marks', $subject->link_marks);

    $smarty->assign('events', Tables::events(true, $subject->name));
    $smarty->assign('planning', Tables::planning(true, 'subjects', $subject->id));
    return $smarty;
}
?>
