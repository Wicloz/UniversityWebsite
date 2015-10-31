<?php
require 'db/data.php';

function editDataItem ($table, $id, $action, $item) {
	global $last_query;
	if ($action == 'insert') {
		$rows = insertEntry ($table, $item);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Inserted!';
		} else {
			$ret .= '<p class="message-error">Insertion Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
	else if ($action == 'update') {
		$rows = updateEntry ($table, $id, $item);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Updated!';
		} else {
			$ret .= '<p class="message-error">Update Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
	else if ($action == 'delete') {
		$rows = deleteEntry ($table, $id);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Deleted!';
		} else {
			$ret .= '<p class="message-error">Deletion Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
}

?>
