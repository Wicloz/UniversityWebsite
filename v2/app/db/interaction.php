<?php
require 'data.php';

function getSubjectsSQL () {
	return doGetQuery("SELECT * FROM subjects WHERE NOT section = 'hc' UNION SELECT * FROM subjects WHERE abbreviation = 'hcbls' UNION SELECT * FROM subjects WHERE section = 'hc' AND NOT abbreviation = 'hcbls'");
}

function getPageForId ($id) {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->id == $id) {
			return $row->file;
		}
	}
}
?>
