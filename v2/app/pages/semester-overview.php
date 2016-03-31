<?php
$pageHasRandom = false;
function createPage ($smarty) {
    $subject_data = array();
    $subjects = Queries::subjects();

    foreach ($subjects as $index => $subject) {
        $assignments = Queries::assignmentsForSubject($subject->name);
        $exams = Queries::examsForSubject($subject->name);
        $subject_data[$index] = array(
            'abbreviation' => $subject->abbreviation,
            'name' => $subject->name,
            'assignments' => array(),
            'ass_line_index' => -1,
            'exams' => array(),
            'ex_line_index' => -1
        );

        foreach ($assignments as $index2 => $assigment) {
            $subject_data[$index]['assignments'][] = array(
                'id' => $assigment->id,
                'date' => DateFormat::dateList($assigment->end_date),
                'description' => $assigment->desc_short
            );
            if (strtotime($assigment->end_date.' '.$assigment->end_time) < strtotime('now')) {
                $subject_data[$index]['ass_line_index'] = $index2;
            }
        }

        foreach ($exams as $index2 => $exam) {
            $subject_data[$index]['exams'][] = array(
                'id' => $exam->id,
                'date' => DateFormat::dateList($exam->date),
                'description' => $exam->weight.' '.$exam->subject_name
            );
            if (strtotime($exam->date) < strtotime('today')) {
                $subject_data[$index]['ex_line_index'] = $index2;
            }
        }
    }

    $smarty->assign('subjects', $subject_data);
    $smarty->assign('events', Tables::events(true));
    return $smarty;
}
?>
