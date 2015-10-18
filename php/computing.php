<?php
require 'db/data.php';

function editDataItem ($table, $id, $action, $item) {	
	if ($action == 'insert') {
		$rows = insertEntry ($table, $item);
		$ret = '<p>';
		if ($rows > 0) {
			$ret .= 'Entry Inserted!';
		} else {
			$ret .= 'Insertion Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
	else if ($action == 'update') {
		$rows = updateEntry ($table, $id, $item);
		$ret = '<p>';
		if ($rows > 0) {
			$ret .= 'Entry Updated!';
		} else {
			$ret .= 'Update Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
	else if ($action == 'delete') {
		$rows = deleteEntry ($table, $id);
		$ret = '<p>';
		if ($rows > 0) {
			$ret .= 'Entry Deleted!';
		} else {
			$ret .= 'Deletion Failed!';
		}
		$ret .= ' Rows affected: '.$rows.'</p>';
		return $ret;
	}
}

function rewritePages () {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		createPageFile($row->file);
	}
}

?>
