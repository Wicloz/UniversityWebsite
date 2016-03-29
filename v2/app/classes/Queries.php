<?php
class Queries {
    static function subjects ($active = false) {
        $activeSearch = array();
        if (!$active) {
            $activeSearch = array("AND", "active", "=", "1");
        }
    	$results1 = DB::instance()->get("subjects", array_merge(array("", "section", "!=", "hc"), $activeSearch), array("name", "ASC"))->results();
    	$results2 = DB::instance()->get("subjects", array_merge(array("", "abbreviation", "=", "hcbls"), $activeSearch))->results();
    	$results3 = DB::instance()->get("subjects", array_merge(array("", "section", "=", "hc", "AND", "abbreviation", "!=", "hcbls"), $activeSearch), array("name", "ASC"))->results();
    	return array_merge($results1, $results2, $results3);
    }

    static function assignmentsForSubject ($subjectname) {
        return DB::instance()->get("assignments", array("", "subject", "=", $subjectname), array("end_date", "ASC", "end_time", "ASC"))->results();
    }

    static function examsForSubject ($subjectname) {
        return DB::instance()->get("exams", array("", "subject", "=", $subjectname), array("date", "ASC"))->results();
    }

    static function article ($name) {
        $data = DB::instance()->get("articles", array("", "name", "=", $name));
        if ($data->count()) {
            return $data->first()->content;
        }
        return '<p class="message-error">Article with name \''.$name.'\' not found.</p>';
    }
}
?>
