<?php
function query_subjects () {
	return DB::instance()->query("SELECT * FROM subjects WHERE NOT section = 'hc' UNION SELECT * FROM subjects WHERE abbreviation = 'hcbls' UNION SELECT * FROM subjects WHERE section = 'hc' AND NOT abbreviation = 'hcbls'")->results();
}
?>
