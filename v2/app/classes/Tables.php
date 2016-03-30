<?php
class Tables {
    public static function assignments ($history = false) {
        $search = array();
        if (!$history) {
            $search = array("", "concat(end_date, end_time)", ">", DateFormat::sql());
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abbreviations = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("assignments", $search, array("end_date", "ASC", "end_time", "ASC"));

        $assignments = array();
        foreach ($data->results() as $entry) {
            if (in_array($entry->subject, $subject_names)) {
                if ($entry->completion) {
                    $entry->state = 'Complete';
                } elseif (strtotime($entry->end_date.' '.$entry->end_time) < strtotime('now')) {
                    $entry->state = 'Overdue';
                } else {
                    $entry->state = 'Working';
                }

                $entry->subject_abb = $subject_abbreviations[array_search($entry->subject, $subject_names)];

                $entry->start_date = DateFormat::dateTable($entry->start_date);
                $entry->end_date = DateFormat::dateTable($entry->end_date);
                $entry->end_time = DateFormat::timeDefault($entry->end_time);

                $assignments[] = $entry;
            }
        }

        return $assignments;
    }

    public static function exams ($history = false) {
        $search = array();
        if (!$history) {
            $search = array("", "date", ">=", DateFormat::sqlDate());
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abbreviations = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("exams", $search, array("date", "ASC"));

        $exams = array();
        foreach ($data->results() as $entry) {
            if (in_array($entry->subject, $subject_names)) {
                $entry->completion = true;
                if (strtotime($entry->date) >= strtotime('today')) {
                    $entry->mark = 'Upcoming';
                    $entry->completion = false;
                } elseif ($entry->mark == 0) {
                    $entry->mark = 'N/A';
                }

                $entry->subject_abb = $subject_abbreviations[array_search($entry->subject, $subject_names)];
                $entry->date = DateFormat::dateTable($entry->date);

                $exams[] = $entry;
            }
        }

        return $exams;
    }

    public static function planning ($history = false, $parent_table = null, $parent_id = null) {
        $searchString = "";
        $searchParams = array();
        if (isset($parent_table)) {
            $searchString .= "WHERE P.parent_table = ?";
            $searchParams[] = $parent_table;
            if (isset($parent_id)) {
                $searchString .= " AND P.parent_id = ?";
                $searchParams[] = $parent_id;
            }
        }

        if (!$history) {
            if (!empty($searchString)) {
                $searchString .= " AND ";
            } else {
                $searchString .= "WHERE ";
            }
            $searchString .= "P.date_end >= ?";
            $searchParams[] = DateFormat::sqlDate();
        }

        $searchParams = array_merge($searchParams, $searchParams, $searchParams);

        $data = DB::instance()->query("
            SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
                FROM `planning` P
                INNER JOIN `subjects` S
                ON P.parent_table = 'subjects' AND P.parent_id = S.id
                {$searchString}
            UNION
            SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
                FROM `planning` P
                INNER JOIN `assignments` A
                ON P.parent_table = 'assignments' AND P.parent_id = A.id
                INNER JOIN `subjects` S
                ON A.subject = S.name
                {$searchString}
            UNION
            SELECT P.*, S.name as 'subject', S.abbreviation as 'subject_abb'
                FROM `planning` P
                INNER JOIN `exams` E
                ON P.parent_table = 'exams' AND P.parent_id = E.id
                INNER JOIN `subjects` S
                ON E.subject = S.name
                {$searchString}
            ORDER BY date_start
        ", $searchParams);

        $planning = $data->results();
        foreach ($planning as $entry) {
            if ($entry->done) {
                $entry->state = 'Done';
            } elseif (strtotime($entry->end_date) < strtotime('today')) {
                $entry->state = 'Overdue';
            } else {
                $entry->state = 'Planned';
            }

            $entry->date_start = DateFormat::dateTable($entry->date_start);
            $entry->date_end = DateFormat::dateTable($entry->date_end);
            $entry->duration = DateFormat::timeDuration($entry->duration);
        }

        return $planning;
    }
}
?>
