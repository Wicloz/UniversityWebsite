<?php
require 'db/data.php';

function editDataItem ($table, $id, $action, $item) {
	global $last_query;
	if ($action == 'insert') {
		$rows = insertEntry($table, $item);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Inserted! Rows affected: '.$rows.'</p>';
		} else {
			$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
		}
		return $ret;
	}
	else if ($action == 'update') {
		$rows = updateEntry($table, $id, $item);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Updated! Rows affected: '.$rows.'</p>';
		} else {
			$ret .= '<p class="message-error">Update Failed! Error message: '.$rows.'</p>';
		}
		return $ret;
	}
	else if ($action == 'delete') {
		$rows = deleteEntry($table, $id);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			$ret .= '<p class="message-success">Entry Deleted! Rows affected: '.$rows.'</p>';
		} else {
			$ret .= '<p class="message-error">Deletion Failed! Error message: '.$rows.'</p>';
		}
		return $ret;
	}
}

function insertEvent ($date, $subject, $task) {
	global $last_query;
	$date = date('Y-m-d', strtotime($date));
	
	if (strpos($task, 'Tentamen') !== false || strpos($task, 'Toets') !== false) {
		$entry['date'] = $date;
		$entry['weight'] = trim(str_replace($subject, '', $task));
		$entry['subject'] = $subject;
		$entry['substance'] = '';
		$entry['link'] = '';
		$entry['mark'] = '0';
		
		$id = getAutoIncrementValue('tentamens');
		$rows = insertEntry('tentamens', $entry);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			header('Location: index.php?page=exams_item&id='.$id);
		} else {
			$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
		}
		return $ret;
	}
	
	else {
		$entry['start_date'] = '';
		$entry['end_date'] = $date;
		$entry['end_time'] = '';
		$entry['subject'] = $subject;
		$entry['desc_short'] = $task;
		$entry['desc_full'] = '';
		$entry['link_assignment'] = '';
		$entry['link_repository'] = '';
		$entry['link_report'] = '';
		$entry['team'] = '';
		$entry['completion'] = '0';
		
		$id = getAutoIncrementValue('assignments');
		$rows = insertEntry('assignments', $entry);
		$ret = '<p class="message-info">'.$last_query.'</p>';
		if ($rows > 0) {
			header('Location: index.php?page=assignments_item&id='.$id);
		} else {
			$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
		}
		return $ret;
	}
}

function insertPlanning ($parent_table, $parent_id, $start_date, $end_date, $duration, $goal) {
	global $last_query;
	
	$subject = '';
	
	$entry['parent_table'] = $parent_table;
	$entry['parent_id'] = $parent_id;
	$entry['date_start'] = date('Y-m-d', strtotime($date_start));
	$entry['date_end'] = date('Y-m-d', strtotime($date_end));
	$entry['subject'] = $subject;
	$entry['duration'] = date('H:i:s', strtotime($duration));
	$entry['goal'] = $goal;
	$entry['done'] = '0';
		
	$rows = insertEntry('planning', $entry);
	$ret = '<p class="message-info">'.$last_query.'</p>';
	if ($rows > 0) {
		$ret .= '<p class="message-success">Entry Inserted! Rows affected: '.$rows.'</p>';
	} else {
		$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
	}
	return $ret;
}

function switchEventCompletion ($table, $id) {
	switch ($table) {
		case 'assignments':
			$result = getEntryWithId($table, $id);
			$row = $result->fetch_assoc();
			$row['completion'] = !$row['completion'];
			
			$rows = updateEntry($table, $id, $row);
			
			if ($rows == false) {
				$ret = '<p class="message-info">'.$last_query.'</p>';
				$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
				return $ret;
			}
		break;
		
		case 'planning':
			$result = getEntryWithId($table, $id);
			$row = $result->fetch_assoc();
			$row['done'] = !$row['done'];
			
			$rows = updateEntry($table, $id, $row);
			
			if ($rows == false) {
				$ret = '<p class="message-info">'.$last_query.'</p>';
				$ret .= '<p class="message-error">Insertion Failed! Error message: '.$rows.'</p>';
				return $ret;
			}
		break;
	}
}

?>
