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

    public static function assignment ($id) {
        return DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE A.id = ?
        ", array($id))->first();
    }

    public static function exam ($id) {
        return DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE E.id = ?
        ", array($id))->first();
    }

    public static function assignmentsForSubject ($subject) {
        return DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE S.abbreviation = ?
                ORDER BY end_date ASC, end_time ASC
        ", array($subject))->results();
    }

    public static function examsForSubject ($subject) {
        return DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE S.abbreviation = ?
                ORDER BY date ASC
        ", array($subject))->results();
    }

    public static function article ($name) {
        $data = DB::instance()->get("articles", array("", "name", "=", $name));
        if ($data->count()) {
            return $data->first()->content;
        }
        return '<p class="message-error">Article with name \''.$name.'\' not found.</p>';
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
            switch ($column->DATA_TYPE) {
                case 'text':
                    $column->type = 'textarea';
                break;
                case 'varchar':
                    $column->type = 'text';
                break;

                case 'date':
                    $column->type = 'date';
                break;
                case 'time':
                    $column->type = 'time';
                break;
                case 'datetime':
                    $column->type = 'datetime';
                break;

                case 'tinyint':
                    $column->type = 'checkbox';
                    $column->checked = $column->value;
                    $column->value = '1';
                break;

                case 'int':
                    $column->type = 'number';
                case 'float':
                    $column->type = 'number';
                    $column->attributes .= 'step="0.01"';
                break;

                default:
                    $column->type = 'text';
                break;
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
        return extractFields($infoData->results(), 'COLUMN_NAME');
    }

    public static function parseAssignment ($object) {
        if ($object->completion) {
            $object->state = 'Complete';
        } elseif (strtotime($object->end_date.' '.$object->end_time) < strtotime('now')) {
            $object->state = 'Overdue';
        } else {
            $object->state = 'Working';
        }
        return $object;
    }

    public static function parseExam ($object) {
        $object->completion = true;
        if (strtotime($object->date) >= strtotime('today')) {
            $object->mark = 'Upcoming';
            $object->completion = false;
        } elseif ($object->mark == 0) {
            $object->mark = 'N/A';
        }
        return $object;
    }

    public static function parsePlanning ($object) {
        if ($object->done) {
            $object->state = 'Done';
        } elseif (strtotime($object->date_end) < strtotime('today')) {
            $object->state = 'Overdue';
        } else {
            $object->state = 'Planned';
        }
        return $object;
    }
}
?>
