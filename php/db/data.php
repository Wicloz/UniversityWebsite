<?php
require 'connect.php';
require 'files.php';
$last_query = '';

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

function getEntriesWithTest ($table, $column, $test) {
	global $db;
	if ($result = $db->query("SELECT * FROM {$table} WHERE {$column} = '{$test}'")) {
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

function getEntriesWithTestSorted ($table, $column, $test, $sort) {
	global $db;
	if ($result = $db->query("SELECT * FROM {$table} WHERE {$column} = '{$test}' ORDER BY {$sort} ASC")) {
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

function getEntriesWithDoubleTestSorted ($table, $column1, $test1, $column2, $test2, $sort) {
	global $db;
	if ($result = $db->query("SELECT * FROM {$table} WHERE {$column1} = '{$test1}' AND {$column2} = '{$test2}' ORDER BY {$sort} ASC")) {
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

function getPageForId ($id) {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->id == $id) {
			return $row->file;
		}
	}
}

function insertEntry ($table, $entry) {
	global $db, $last_query;
	
	foreach ($entry as $key => $value) {
		$key_items[] = $db->escape_string($key);
		$value_items[] = '\''.$db->escape_string($value).'\'';
	}
	$keys = implode(', ', $key_items);
	$values = implode(', ', $value_items);
	
	$qry = "INSERT INTO {$db->escape_string($table)} ({$keys}) VALUES ({$values})";
	$last_query = $qry;
	
	if ($update = $db->query($qry)) {
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

function updateEntry ($table, $id, $entry) {
	global $db, $last_query;
	
	foreach ($entry as $key => $value) {
		$updates[] = $db->escape_string($key).'='.'\''.$db->escape_string($value).'\'';
	}
	$update = implode(', ', $updates);
	
	$qry = "UPDATE {$db->escape_string($table)} SET {$update} WHERE id = {$id}";
	$last_query = $qry;
	
	if ($update = $db->query($qry)) {	
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

function deleteEntry ($table, $id) {
	global $db, $last_query;
	
	$qry = "DELETE FROM {$db->escape_string($table)} WHERE id = {$db->escape_string($id)}";
	$last_query = $qry;
	
	if ($update = $db->query($qry)) {	
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

?>
