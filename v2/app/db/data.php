<?php
require 'connect.php';
$last_setQuery = '';
$last_getQuery = '';
$last_setError = '';
$last_getError = '';

function doGetQuery ($query) {
    global $db, $last_getQuery, $last_getError;
    $last_getQuery = $query;
    $last_getError = "";

    if ($result = $db->query($query)) {
    	if ($result->num_rows > 0) {
    		return $result;
    		$result->free();
    	} else {
    		$last_getError = 0;
    	}
    } else {
    	$last_getError = $db->error;
    }
}

function getAllEntries ($table) {
    return doGetQuery("SELECT * FROM {$table}");
}

function getAllEntriesSorted ($table, $column) {
	return doGetQuery("SELECT * FROM {$table} ORDER BY {$column} ASC");
}

function getEntryWithId ($table, $id) {
	return doGetQuery("SELECT * FROM {$table} WHERE id = {$id}");
}

function getEntryWithTest ($table, $column, $test) {
	return doGetQuery("SELECT * FROM {$table} WHERE {$column} = '{$test}'");
}

function getEntriesWithTest ($table, $column, $test) {
	return doGetQuery("SELECT * FROM {$table} WHERE {$column} = '{$test}'");
}

function getEntriesWithTestSorted ($table, $column, $test, $sort) {
	return doGetQuery("SELECT * FROM {$table} WHERE {$column} = '{$test}' ORDER BY {$sort} ASC");
}

function getEntriesWithDoubleTestSorted ($table, $column1, $test1, $column2, $test2, $sort) {
	return doGetQuery("SELECT * FROM {$table} WHERE {$column1} = '{$test1}' AND {$column2} = '{$test2}' ORDER BY {$sort} ASC");
}

function getAutoIncrementValue ($table) {
	return doGetQuery("SHOW TABLE STATUS LIKE '{$table}'");
}

function getTableFormInfo ($table) {
	global $db_dbname;
	return doGetQuery("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='{$db_dbname}' AND TABLE_NAME='{$table}'");
}

function insertEntry ($table, $entry) {
	global $db, $last_setQuery, $last_setError;

	foreach ($entry as $key => $value) {
		$key_items[] = $db->escape_string($key);
		$value_items[] = '\''.$db->escape_string($value).'\'';
	}
	$keys = implode(', ', $key_items);
	$values = implode(', ', $value_items);

	$qry = "INSERT INTO {$db->escape_string($table)} ({$keys}) VALUES ({$values})";
	$last_setQuery = $qry;
    $last_setError = "";

	if ($update = $db->query($qry)) {
		return $db->affected_rows;
	} else {
        $last_setError = $db->error;
		return $db->error;
	}
}

function updateEntry ($table, $id, $entry) {
	global $db, $last_query, $last_setError;

	foreach ($entry as $key => $value) {
		$updates[] = $db->escape_string($key).'='.'\''.$db->escape_string($value).'\'';
	}
	$update = implode(', ', $updates);

	$qry = "UPDATE {$db->escape_string($table)} SET {$update} WHERE id = {$id}";
	$last_setQuery = $qry;
    $last_setError = "";

	if ($update = $db->query($qry)) {
		return $db->affected_rows;
	} else {
        $last_setError = $db->error;
		return $db->error;
	}
}

function deleteEntry ($table, $id) {
	global $db, $last_query, $last_setError;

	$qry = "DELETE FROM {$db->escape_string($table)} WHERE id = {$db->escape_string($id)}";
	$last_setQuery = $qry;
    $last_setError = "";

	if ($update = $db->query($qry)) {
		return $db->affected_rows;
	} else {
        $last_setError = $db->error;
		return $db->error;
	}
}
?>
