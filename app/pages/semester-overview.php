<?php
$allowCaching = false;
function createPage ($smarty) {
    $subjects = Queries::subjects();

    foreach ($subjects as $index => $subject) {
        $assignments = Queries::assignments(true, $subject->abbreviation);
        $exams = Queries::exams(true, $subject->abbreviation);

        $subjects[$index]->ass_line_index = -1;
        $subjects[$index]->ex_line_index = -1;
        $subjects[$index]->assignments = $assignments;
        $subjects[$index]->exams = $exams;

        foreach ($assignments as $index2 => $assigment) {
            if (strtotime($assigment->end_date.' '.$assigment->end_time) < strtotime('now')) {
                $subjects[$index]->ass_line_index = $index2;
            }
        }

        foreach ($exams as $index2 => $exam) {
            if (strtotime($exam->date) < strtotime('today')) {
                $subjects[$index]->ex_line_index = $index2;
            }
        }
    }

    $smarty->assign('subjects', $subjects);
    $smarty->assign('events', Tables::events(true));
    return $smarty;
}
?>
