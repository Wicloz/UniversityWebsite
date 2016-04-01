<?php
class Tables {
    public static function assignments ($history) {
        if (Input::exists() && Token::check(Input::get('token')) && Input::get('action') === 'switch_completion') {
            Update::switchCompletion();
        }

        $search = array();
        if (!$history) {
            $search = array("", "concat(end_date, end_time)", ">", DateFormat::sql());
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abbreviations = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("assignments", $search, array("end_date", "ASC", "end_time", "ASC"));

        $results = array();
        $index = 0;
        $now_pos = 0;
        foreach ($data->results() as $entry) {
            if (in_array($entry->subject_name, $subject_names)) {
                if ($entry->completion) {
                    $entry->state = 'Complete';
                } elseif (strtotime($entry->end_date.' '.$entry->end_time) < strtotime('now')) {
                    $entry->state = 'Overdue';
                } else {
                    $entry->state = 'Working';
                }

                $entry->subject = $subject_abbreviations[array_search($entry->subject_name, $subject_names)];
                if (strtotime($entry->end_date.' '.$entry->end_time) < strtotime('now')) {
                    $now_pos = $index + 1;
                }

                $entry->start_date = DateFormat::dateTable($entry->start_date);
                $entry->end_date = DateFormat::dateTable($entry->end_date);
                $entry->end_time = DateFormat::timeDefault($entry->end_time);

                $results[] = $entry;
                $index++;
            }
        }
        $today = new stdClass();
        $today->completion = false;
        $today->end_date = '<b>'.DateFormat::dateTable().'</b>';
        $today->end_time = '<b<'.DateFormat::timeDefault().'</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->desc_short = '</a><b>Thats why it\'s called the present</b><a href="">';
        $today->team = '';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function exams ($history) {
        $search = array();
        if (!$history) {
            $search = array("", "date", ">=", DateFormat::sqlDate());
        }

        $dataSubjects = Queries::subjects();
        $subject_names = extractFields($dataSubjects, 'name');
        $subject_abbreviations = extractFields($dataSubjects, 'abbreviation');
        $data = DB::instance()->get("exams", $search, array("date", "ASC"));

        $results = array();
        $index = 0;
        $now_pos = 0;
        foreach ($data->results() as $entry) {
            if (in_array($entry->subject_name, $subject_names)) {
                $entry->completion = true;
                if (strtotime($entry->date) >= strtotime('today')) {
                    $entry->mark = 'Upcoming';
                    $entry->completion = false;
                } elseif ($entry->mark == 0) {
                    $entry->mark = 'N/A';
                }

                $entry->subject = $subject_abbreviations[array_search($entry->subject_name, $subject_names)];
                if (strtotime($entry->date) < strtotime('today')) {
                    $now_pos = $index + 1;
                }
                $entry->date = DateFormat::dateTable($entry->date);

                $results[] = $entry;
                $index++;
            }
        }
        $today = new stdClass();
        $today->completion = false;
        $today->date = '<b>'.DateFormat::dateTable().'</b>';
        $today->weight = '</a><b>Today is a gift</b><a href="">';
        $today->subject_name = '</a><b>Thats why it\'s called the present</b><a href="">';
        $today->mark = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function planning ($history, $parent_table = null, $parent_id = null) {
        $searchString = "";
        $searchParams = array();
        if (isset($parent_table)) {
            $searchString .= "AND P.parent_table = ?";
            $searchParams[] = $parent_table;
            if (isset($parent_id)) {
                $searchString .= "AND P.parent_id = ?";
                $searchParams[] = $parent_id;
            }
        }
        if (!$history) {
            $searchString .= "AND P.date_end >= ?";
            $searchParams[] = DateFormat::sqlDate();
        }

        $searchParams = array_merge($searchParams, $searchParams, $searchParams);

        $data = DB::instance()->query("
            SELECT P.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `subjects` S
                ON P.parent_table = 'subjects' AND P.parent_id = S.id
                WHERE S.active {$searchString}
            UNION
            SELECT P.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `assignments` A
                ON P.parent_table = 'assignments' AND P.parent_id = A.id
                INNER JOIN `subjects` S
                ON A.subject_name = S.name
                WHERE S.active {$searchString}
            UNION
            SELECT P.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `exams` E
                ON P.parent_table = 'exams' AND P.parent_id = E.id
                INNER JOIN `subjects` S
                ON E.subject_name = S.name
                WHERE S.active {$searchString}
            ORDER BY date_start
        ", $searchParams);

        $results = $data->results();
        $now_pos = 0;
        foreach ($results as $index => $entry) {
            if ($entry->done) {
                $entry->state = 'Done';
            } elseif (strtotime($entry->date_end) < strtotime('today')) {
                $entry->state = 'Overdue';
            } else {
                $entry->state = 'Planned';
            }

            if (strtotime($entry->date_end) < strtotime('today')) {
                $now_pos = $index + 1;
            }

            $entry->date_start = DateFormat::dateTable($entry->date_start);
            $entry->date_end = DateFormat::dateTable($entry->date_end);
            $entry->duration = DateFormat::timeDuration($entry->duration);
        }
        $today = new stdClass();
        $today->done = false;
        $today->date_start = '<b>'.DateFormat::dateTable().'</b>';
        $today->date_end = '<b>'.DateFormat::dateTable().'</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->duration = '<b>-</b>';
        $today->goal = '<b>Thats why it\'s called the present</b>';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function events ($history, $subject = null) {
        $searchString1 = "";
        $searchString2 = "";
        $searchParams = array();
        if (isset($subject)) {
            $searchString1 .= "AND S.subject_name = ?";
            $searchString2 .= "AND S.subject_name = ?";
            $searchParams[] = $subject;
        }
        if (!$history) {
            $searchString1 .= "AND concat(A.end_date, ' ', A.end_time) > ?";
            $searchString2 .= "AND concat(E.date, ' 24:00:00') >= ?";
            $searchParams[] = DateFormat::sql();
        }

        $searchParams = array_merge($searchParams, $searchParams);

        $data = DB::instance()->query("
            SELECT A.id, concat(A.end_date, ' ', A.end_time) as 'date', A.desc_short as 'task', A.completion as 'completion', 'assignment' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject_name = S.name
                WHERE S.active {$searchString1}
            UNION
            SELECT E.id, E.date, concat(E.weight, ' ', S.name) as 'task', E.mark as 'completion', 'exam' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject_name = S.name
                WHERE S.active {$searchString2}
            ORDER BY date
        ", $searchParams);

        $results = $data->results();
        $now_pos = 0;
        foreach ($results as $index => $entry) {
            if ($entry->type === 'assignment' && strtotime($entry->date) < strtotime('now')) {
                $now_pos = $index + 1;
            } elseif (strtotime($entry->date) < strtotime('today')) {
                $now_pos = $index + 1;
            }
            self::parseEvent($entry);
        }
        $today = new stdClass();
        $today->completion = false;
        $today->date = '<b>'.DateFormat::dateTable().'</b>';
        $today->type = '<b>-</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->task = '<b>Thats why it\'s called the present</b>';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function today () {
        $data = DB::instance()->query("
            SELECT A.id, concat(A.end_date, ' ', A.end_time) as 'date', A.desc_short as 'task', A.completion as 'completion', 'assignment' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject_name = S.name
                WHERE S.active AND A.end_date = ?
            UNION
            SELECT E.id, E.date, concat(E.weight, ' ', S.name) as 'task', E.mark as 'completion', 'exam' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject_name = S.name
                WHERE S.active AND E.date = ?
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.done as 'completion', 'planning' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `subjects` S
                ON P.parent_table = 'subjects' AND P.parent_id = S.id
                WHERE S.active AND P.date_start <= ? AND P.date_end >= ?
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.done as 'completion', 'planning' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `assignments` A
                ON P.parent_table = 'assignments' AND P.parent_id = A.id
                INNER JOIN `subjects` S
                ON A.subject_name = S.name
                WHERE S.active AND P.date_start <= ? AND P.date_end >= ?
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.done as 'completion', 'planning' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `planning` P
                INNER JOIN `exams` E
                ON P.parent_table = 'exams' AND P.parent_id = E.id
                INNER JOIN `subjects` S
                ON E.subject_name = S.name
                WHERE S.active AND P.date_start <= ? AND P.date_end >= ?
            ORDER BY date
        ", array(
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate()
        ));

        $results = $data->results();
        foreach ($results as $index => $entry) {
            self::parseEvent($entry);
        }

        return $results;
    }

    private static function parseEvent ($object) {
        if ($object->type === 'assignment') {
            if ($object->completion) {
                $object->state = 'Complete';
            } elseif (strtotime($object->date) < strtotime('now')) {
                $object->state = 'Overdue';
            } else {
                $object->state = 'Working';
            }
        } elseif ($object->type === 'exam') {
            if (strtotime($object->date) >= strtotime('today')) {
                $object->state = 'Upcoming';
                $object->completion = 0;
            } else {
                $object->state = 'Passed';
                $object->completion = 1;
            }
        } elseif ($object->type === 'planning') {
            if ($object->completion) {
                $object->state = 'Done';
            } elseif (strtotime($object->date) < strtotime('today')) {
                $object->state = 'Overdue';
            } else {
                $object->state = 'Planned';
            }
        }

        $object->date = DateFormat::dateTable($object->date);
    }
}
?>
