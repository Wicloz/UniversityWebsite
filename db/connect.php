<?php
$db = new mysqli('mysql.liacs.leidenuniv.nl', 's1704362', 'Biep4Boop', 's1704362');
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
		return $db->error;
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
		return $db->error;
	}
}

?>
