<?php
class Queries {
    static function subjects () {
    	$results1 = DB::instance()->get("subjects", array("", "section", "!=", "hc"), array("name", "ASC"))->results();
    	$results2 = DB::instance()->get("subjects", array("", "abbreviation", "=", "hcbls"))->results();
    	$results3 = DB::instance()->get("subjects", array("", "section", "=", "hc", "AND", "abbreviation", "!=", "hcbls"), array("name", "ASC"))->results();
    	return array_merge($results1, $results2, $results3);
    }
}
?>
