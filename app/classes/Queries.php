<?php
class Queries {
    static function subjects ($inactive = false) {
        $activeSearch = array();
        if (!$inactive) {
            $activeSearch = array("AND", "active", "=", "1");
        }
    	$results1 = DB::instance()->get("subjects", array_merge(array("", "section", "!=", "hc"), $activeSearch), array("name", "ASC"))->results();
    	$results2 = DB::instance()->get("subjects", array_merge(array("", "abbreviation", "=", "hcbls"), $activeSearch))->results();
    	$results3 = DB::instance()->get("subjects", array_merge(array("", "section", "=", "hc", "AND", "abbreviation", "!=", "hcbls"), $activeSearch), array("name", "ASC"))->results();
    	return array_merge($results1, $results2, $results3);
    }

    static function assignment ($id) {
        return DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE A.id = ?
        ", array($id))->first();
    }

    static function exam ($id) {
        return DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE E.id = ?
        ", array($id))->first();
    }

    static function assignmentsForSubject ($subject) {
        return DB::instance()->query("
            SELECT A.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `assignments` A
                INNER JOIN `subjects` S
                ON A.subject = S.abbreviation
                WHERE S.abbreviation = ?
                ORDER BY end_date ASC, end_time ASC
        ", array($subject))->results();
    }

    static function examsForSubject ($subject) {
        return DB::instance()->query("
            SELECT E.*, S.name as 'subject_name', S.abbreviation as 'subject'
                FROM `exams` E
                INNER JOIN `subjects` S
                ON E.subject = S.abbreviation
                WHERE S.abbreviation = ?
                ORDER BY date ASC
        ", array($subject))->results();
    }

    static function article ($name) {
        $data = DB::instance()->get("articles", array("", "name", "=", $name));
        if ($data->count()) {
            return $data->first()->content;
        }
        return '<p class="message-error">Article with name \''.$name.'\' not found.</p>';
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
