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

function insertEntry ($table, $entry) {
	global $db;
	
	foreach ($entry as $key => $value) {
		$key_items[] = $key;
		$value_items[] = '\''.$db->escape_string($value).'\'';
	}
	$keys = implode(', ', $key_items);
	$values = implode(', ', $value_items);
	
	$qry = "INSERT INTO {$table} ({$keys}) VALUES ({$values})";
	echo $qry;
	
	if ($update = $db->query($qry)) {
		echo $db->affected_rows;
	} else {
		return $db->error;
	}
}

function updateEntry ($table, $id, $entry) {
	global $db;
	
	foreach ($entry as $key => $value) {
		$updates[] = $key . '=' . '\''.$db->escape_string($value).'\'';
	}
	$update = implode(', ', $updates);
	
	$qry = "UPDATE {$table} SET {$update} WHERE id = {$id}";
	echo $qry;
	
	if ($update = $db->query($qry)) {
		echo $db->affected_rows;
	} else {
		return $db->error;
	}
}

?>