<?php
class Tables {
    public static function assignments ($history = false) {
        $search = array();
        if (!$history) {
            $search = array(
                "", "concat(end_date, end_time)", ">", DateFormat::sql()
            );
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abbreviations = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("assignments", $search, array("end_date", "ASC", "end_time", "ASC"));

        $assignments = array();
        foreach ($data->results() as $assignment) {
            if (in_array($assignment->subject, $subject_names)) {
                if ($assignment->completion) {
                    $assignment->state = 'Complete';
                } elseif (strtotime($assignment->end_date.' '.$assignment->end_time) < strtotime('now')) {
                    $assignment->state = 'Overdue';
                } else {
                    $assignment->state = 'Working';
                }

                $assignment->subject_abbreviation = $subject_abbreviations[array_search($assignment->subject, $subject_names)];

                $assignment->start_date = DateFormat::dateTable($assignment->start_date);
                $assignment->end_date = DateFormat::dateTable($assignment->end_date);
                $assignment->end_time = DateFormat::timeDefault($assignment->end_time);

                $assignments[] = $assignment;
            }
        }

        return $assignments;
    }

    public static function exams ($history = false) {
        $search = array();
        if (!$history) {
            $search = array(
                "", "date", ">=", DateFormat::sqlDate()
            );
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abb = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("exams", $search, array("date", "ASC"));

        $exams = array();
        foreach ($data->results() as $exam) {
            if (in_array($exam->subject, $subject_names)) {
                $exam->completion = true;
                if (strtotime($exam->date) >= strtotime('today')) {
                    $exam->mark = 'Upcoming';
                    $exam->completion = false;
                } elseif ($exam->mark == 0) {
                    $exam->mark = 'N/A';
                }

                $exam->subject_abb = $subject_abbreviations[array_search($exam->subject, $subject_names)];
                $exam->date = DateFormat::dateTable($exam->date);

                $exams[] = $exam;
            }
        }

        return $exams;
    }
}

SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
FROM `planning` P
INNER JOIN `subjects` S
ON P.parent_table = 'subjects' AND P.parent_id = S.id
UNION
SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
FROM `planning` P
INNER JOIN `assignments` A
ON P.parent_table = 'assignments' AND P.parent_id = A.id
INNER JOIN `subjects` S
ON A.subject = S.name
UNION
SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
FROM `planning` P
INNER JOIN `exams` E
ON P.parent_table = 'exams' AND P.parent_id = E.id
INNER JOIN `subjects` S
ON E.subject = S.name
?>
