<?php
require 'data.php';
require 'files.php';

function data_subjects () {
	return doGetQuery("SELECT * FROM subjects WHERE NOT section = 'hc' UNION SELECT * FROM subjects WHERE abbreviation = 'hcbls' UNION SELECT * FROM subjects WHERE section = 'hc' AND NOT abbreviation = 'hcbls'");
}
?>
