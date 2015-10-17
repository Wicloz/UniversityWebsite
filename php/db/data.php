<?php
require 'connect.php';
require 'files.php';

function getAllEntries ($table) {
	global $db;
	if ($result = $db->query("SELECT * FROM {$table}")) {
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

function getAllEntriesSorted ($table, $column) {
	global $db;
	if ($result = $db->query("SELECT * FROM {$table} ORDER BY {$column} ASC")) {
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
	if ($result = $db->query("SELECT * FROM {$table} WHERE id = {$id}")) {
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

function getFileForId ($id) {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->id == $id) {
			return $row->file;
		}
	}
}

function insertEntry ($table, $entry) {
	global $db;
	
	foreach ($entry as $key => $value) {
		$key_items[] = $db->escape_string($key);
		$value_items[] = '\''.$db->escape_string($value).'\'';
	}
	$keys = implode(', ', $key_items);
	$values = implode(', ', $value_items);
	
	$qry = "INSERT INTO {$db->escape_string($table)} ({$keys}) VALUES ({$values})";
	echo $qry;
	
	if ($update = $db->query($qry)) {
		
		if ($table == 'pages') {
			createPageFile($entry['file']);
		}
		
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

function updateEntry ($table, $id, $entry) {
	global $db;
	
	foreach ($entry as $key => $value) {
		$updates[] = $db->escape_string($key).'='.'\''.$db->escape_string($value).'\'';
	}
	$update = implode(', ', $updates);
	
	$qry = "UPDATE {$db->escape_string($table)} SET {$update} WHERE id = {$id}";
	echo $qry;
	
	if ($table == 'pages') {
		$oldFile = getFileForId($id);
	}
	
	if ($update = $db->query($qry)) {
		
		if ($table == 'pages') {
			removeFile($oldFile);
			createPageFile($entry['file']);
		}
		
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

function deleteEntry ($table, $id) {
	global $db;
	
	$qry = "DELETE FROM {$db->escape_string($table)} WHERE id = {$db->escape_string($id)}";
	echo $qry;
	
	if ($table == 'pages') {
		$file = getFileForId($id);
	}
	
	if ($update = $db->query($qry)) {
		
		if ($table == 'pages') {
			removeFile($file);
		}
		
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

?>