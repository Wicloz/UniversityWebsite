<?php
require 'connect.php';

function getAllEntries ($table) {
	global $db;
	if ($result = $db->query("SELECT * FROM " . $table)) {
		if ($result->num_rows) {
			return $result;
			$result->free();
		} else {
			return false;
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
		} else {
			return false;
		}
	} else {
		return $db->error;
	}
}

function getTableFormInfo ($table) {
	global $db, $db_dbname;
	if ($result = $db->query("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='{$db_dbname}' AND TABLE_NAME='{$table}'")) {
		if ($result->num_rows) {
			return $result;
			$result->free();
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function addNewEntry ($table, $entry) {
	global $db;
	
	foreach ($entry as $key => $value) {
		$key_items[] = $key;
		$value_items[] = $value;
	}
	$keys = implode(', ', $key_items);
	$values = implode(', ', $value_items);
	
	$qry = $db->mysql_real_escape_string("INSERT INTO {$table} {$keys} VALUES {$values}");
	
	if ($update = $db->query($qry)) {
		echo $db->affected_rows;
	} else {
		return $db->error;
	}
}

function updateEntry ($table, $id, $entry) {
	global $db;
	
	$qry = $db->mysql_real_escape_string("");
	
	if ($update = $db->query($qry)) {
		echo $db->affected_rows;
	} else {
		return $db->error;
	}
}

?>