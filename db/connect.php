<?php
$db = new mysqli('127.0.0.1', 'root', '', 'app');
if ($db->connect_errno) {
	die('Database errors, sorry for the inconvenience.');
}
	
function getAllEntries ($table) {
	global $db;
	if ($result = $db->query("SELECT * FROM " . $table)) {
		if ($result->num_rows) {
			return $result;
			$result->free();
		}
	} else {
		return ($db->error);
	}
}

function getEntryWithId ($table, $id) {
	global $db;
	if ($result = $db->query("SELECT * FROM " . $table . " WHERE id = " . $id)) {
		if ($result->num_rows) {
			return $result;
			$result->free();
		}
	} else {
		return ($db->error);
	}
}

?>