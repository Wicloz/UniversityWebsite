<?php
class Queries {
    public static function subjects ($inactive = false) {
        $activeSearch = array();
        if (!$inactive) {
            $activeSearch = array("AND", "active", "=", "1");
        }
    	$results1 = DB::instance()->get("subjects", array_merge(array("", "section", "!=", "hc"), $activeSearch), array("name", "ASC"))->results();
    	$results2 = DB::instance()->get("subjects", array_merge(array("", "abbreviation", "=", "hcbls"), $activeSearch))->results();
    	$results3 = DB::instance()->get("subjects", array_merge(array("", "section", "=", "hc", "AND", "abbreviation", "!=", "hcbls"), $activeSearch), array("name", "ASC"))->results();
    	return array_merge($results1, $results2, $results3);
    }

    public static function assignmentWithId ($id) {
        return self::parseAssignment(DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE A.id = ?
        ", array($id))->first());
    }

    public static function examWithId ($id) {
        return self::parseExam(DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE E.id = ?
        ", array($id))->first());
    }

    public static function article ($name) {
        $data = DB::instance()->get("articles", array("", "name", "=", $name));
        if ($data->count()) {
            return $data->first()->content;
        }
        return '<p class="message-error">Article with name \''.$name.'\' not found.</p>';
    }

    public static function assignments ($history, $subject = null) {
        $searchString = "";
        $searchParams = array();
        if (isset($subject)) {
            $searchString = "WHERE S.abbreviation = ?";
            $searchParams[] = $subject;
        } else {
            $searchString = "WHERE S.active";
        }
        if (!$history) {
            $searchString .= "AND (concat(A.end_date, A.end_time) > ? OR A.completion = 0)";
            $searchParams[] = DateFormat::sql();
        }

        $data = DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                {$searchString}
                ORDER BY end_date ASC, end_time ASC
        ", $searchParams);

        $results = $data->results();
        foreach ($results as $entry) {
            $entry = self::parseAssignment($entry);
        }
        return $results;
    }

    public static function exams ($history, $subject = null) {
        $searchString = "";
        $searchParams = array();
        if (isset($subject)) {
            $searchString = "WHERE S.abbreviation = ?";
            $searchParams[] = $subject;
        } else {
            $searchString = "WHERE S.active";
        }
        if (!$history) {
            $searchString .= "AND E.date >= ?";
            $searchParams[] = DateFormat::sqlDate();
        }

        $data = DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                {$searchString}
                ORDER BY date ASC
        ", $searchParams);

        $results = $data->results();
        foreach ($results as $entry) {
            $entry = self::parseExam($entry);
        }
        return $results;
    }

    public static function planning ($history, $parent_table = null, $parent_id = null) {
        $searchStringBegin = "WHERE S.active";
        $searchString = "";
        $searchParams = array();
        if (isset($parent_table)) {
            $searchString .= " AND P.parent_table = ?";
            $searchParams[] = $parent_table;
            if (isset($parent_id)) {
                $searchStringBegin = "WHERE 1=1";
                $searchString .= " AND P.parent_id = ?";
                $searchParams[] = $parent_id;
            }
        }
        if (!$history) {
            $searchString .= " AND (P.date_end >= ? OR P.completion = 0)";
            $searchParams[] = DateFormat::sqlDate();
        }

        $searchParams = array_merge($searchParams, $searchParams, $searchParams);

        $data = DB::instance()->query("
            SELECT P.*, S.name as 'parent_name', concat('page=subjects&subject=', S.abbreviation) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `subjects` S
                ON P.parent_table = 'subjects' AND P.parent_id = S.id
                {$searchStringBegin}{$searchString}
            UNION
            SELECT P.*, A.desc_short as 'parent_name', concat('page=assignments_item&id=', A.id) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `".Users::showSid()."_assignments` A
                ON P.parent_table = 'assignments' AND P.parent_id = A.id
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                {$searchStringBegin}{$searchString}
            UNION
            SELECT P.*, concat(E.weight, ' ', S.name) as 'parent_name', concat('page=exams_item&id=', E.id) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `".Users::showSid()."_exams` E
                ON P.parent_table = 'exams' AND P.parent_id = E.id
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                {$searchStringBegin}{$searchString}
            ORDER BY date_end ASC, date_start ASC
        ", $searchParams);

        $results = $data->results();
        foreach ($results as $entry) {
            $entry = self::parsePlanning($entry);
        }
        return $results;
    }

    public static function events ($history, $subject = null) {
        $searchString1 = "";
        $searchString2 = "";
        $searchParams = array();
        if (isset($subject)) {
            $searchString1 = "WHERE S.abbreviation = ?";
            $searchString2 = "WHERE S.abbreviation = ?";
            $searchParams[] = $subject;
        } else {
            $searchString1 = "WHERE S.active";
            $searchString2 = "WHERE S.active";
        }
        if (!$history) {
            $searchString1 .= " AND (concat(A.end_date, ' ', A.end_time) > ? OR A.completion = 0)";
            $searchString2 .= " AND concat(E.date, ' 24:00:00') >= ?";
            $searchParams[] = DateFormat::sql();
        }

        $searchParams = array_merge($searchParams, $searchParams);

        $data = DB::instance()->query("
            SELECT A.id, concat(A.end_date, ' ', A.end_time) as 'date', A.desc_short as 'task', A.completion as 'completion', 'assignment' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                {$searchString1}
            UNION
            SELECT E.id, E.date, concat(E.weight, ' ', S.name) as 'task', E.mark as 'completion', 'exam' as 'type', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                {$searchString2}
            ORDER BY date ASC
        ", $searchParams);

        $results = $data->results();
        foreach ($results as $entry) {
            self::parseEvent($entry);
        }
        return $results;
    }

    public static function today () {
        $data = DB::instance()->query("
            SELECT A.id, concat(A.end_date, ' ', A.end_time) as 'date', A.desc_short as 'task', A.completion as 'completion', 'assignment' as 'type', S.name as 'parent_name', concat('page=subjects&subject=', S.abbreviation) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE A.end_date = ? OR (A.completion = 0 AND A.end_date < ?)
            UNION
            SELECT E.id, E.date, concat(E.weight, ' ', S.name) as 'task', E.mark as 'completion', 'exam' as 'type', S.name as 'parent_name', concat('page=subjects&subject=', S.abbreviation) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE E.date = ?
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.completion, 'planning' as 'type', S.name as 'parent_name', concat('page=subjects&subject=', S.abbreviation) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `subjects` S
                ON P.parent_table = 'subjects' AND P.parent_id = S.id
                WHERE (P.date_start <= ? AND P.date_end >= ?) OR (P.completion = 0 AND P.date_end < ?)
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.completion, 'planning' as 'type', A.desc_short as 'parent_name', concat('page=assignments_item&id=', A.id) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `".Users::showSid()."_assignments` A
                ON P.parent_table = 'assignments' AND P.parent_id = A.id
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE (P.date_start <= ? AND P.date_end >= ?) OR (P.completion = 0 AND P.date_end < ?)
            UNION
            SELECT P.id, P.date_end as 'date', P.goal as 'task', P.completion, 'planning' as 'type', concat(E.weight, ' ', S.name) as 'parent_name', concat('page=exams_item&id=', E.id) as 'parent_page', S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `".Users::showSid()."_planning` P
                INNER JOIN `".Users::showSid()."_exams` E
                ON P.parent_table = 'exams' AND P.parent_id = E.id
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE (P.date_start <= ? AND P.date_end >= ?) OR (P.completion = 0 AND P.date_end < ?)
            ORDER BY completion DESC, date ASC
        ", array(
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
            DateFormat::sqlDate(),
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
        foreach ($results as $entry) {
            self::parseEvent($entry);
        }
        return $results;
    }

    public static function editableEntry ($table, $id) {
        $info = DB::tableFormInfo($table);
        if (empty($info)) {
            Redirect::error(404);
        }
        if ($id !== 'create') {
            $entry = (array) DB::instance()->get($table, array("", "id", "=", $id))->first();
            if (empty($entry)) {
                Redirect::error(404);
            }
        }

        foreach ($info as $column) {
            $column->value = ($id !== 'create') ? $entry[$column->COLUMN_NAME] : '';
            $column->attributes = '';
            $column->classes = '';
            switch ($column->DATA_TYPE) {
                case 'text':
                    $column->type = 'textarea';
                break;
                case 'varchar':
                    $column->type = 'text';
                break;

                case 'date':
                    $column->type = 'date';
                    $column->classes = 'datesql';
                break;
                case 'time':
                    $column->type = 'time';
                    $column->classes = 'time';
                break;
                case 'datetime':
                    $column->type = 'datetime';
                    $column->classes = 'datetimesql';
                break;

                case 'tinyint':
                    $column->type = 'checkbox';
                    $column->checked = $column->value;
                    $column->value = '1';
                break;

                case 'int':
                    $column->type = 'number';
                break;
                case 'float':
                    $column->type = 'number';
                    $column->attributes .= 'step="0.01"';
                break;

                default:
                    $column->type = 'text';
                break;
            }
            if (substr($column->value, 0, 1) === '{' && substr($column->value, strlen($column->value) - 1, 1) === '}') {
                $column->type = 'json';
            }
        }

        return $info;
    }

    public static function itemList ($table) {
        $entries = DB::instance()->get($table)->results();
        foreach ($entries as $index => $entry) {
            $entries[$index] = (array) $entry;
        }
        return $entries;
    }

    public static function itemListHeaders ($table) {
        $info = DB::tableFormInfo($table);
        if (empty($info)) {
            Redirect::error(404);
        }
        return extractFields($info, 'COLUMN_NAME');
    }

    public static function parseAssignment ($object) {
        if (!empty($object->id)) {
            if ($object->completion) {
                $object->state = 'Complete';
            } elseif (strtotime($object->end_date.' '.$object->end_time) < strtotime('now')) {
                $object->state = 'Overdue';
            } else {
                $object->state = 'Working';
            }
        }
        return $object;
    }

    public static function parseExam ($object) {
        if (!empty($object->id)) {
            $object->completion = 1;
            if (strtotime($object->date) >= strtotime('today')) {
                $object->mark = 'Upcoming';
                $object->completion = 0;
            } elseif ($object->mark == 0) {
                $object->mark = 'N/A';
            }
        }
        return $object;
    }

    public static function parsePlanning ($object) {
        if (!empty($object->id)) {
            if ($object->completion) {
                $object->state = 'Done';
            } elseif (strtotime($object->date_end) < strtotime('today')) {
                $object->state = 'Overdue';
            } else {
                $object->state = 'Planned';
            }
        }
        return $object;
    }

    private static function parseEvent ($object) {
        if (!empty($object->id)) {
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
        }
        return $object;
    }
}
?>
