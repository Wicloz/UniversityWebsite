<?php
require 'connect.php';

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