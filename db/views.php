<?php
require 'items.php';

function getContent ($name, $GET, $POST) {
	$ret = '';
	
	switch ($name) {
		case 'calendar_exams';
			$ret .= getCalendarExams();
		break;
		
		case 'table_exams';
			$ret .= '<h2>Exams:</h2>';
			$ret .= getTableTentamens();
		break;
		
		case 'table_assignments';
			$ret .= '<h2>Assignments:</h2>';
			$ret .= getTableAssignments();
		break;
		
		case 'item_assignment';
			if (isset($GET['id'])) {
				$itemId = $GET['id'];
				if (!empty($itemId)) {
					$ret .= getItemAssignment($itemId);
				}
			}
		break;
		
		case 'form_editItem';
			if (isset($POST['action']) && isset($POST['table']) && isset($POST['id']) && !empty($POST['action']) && !empty($POST['table']) && !empty($POST['id'])) {
				$table = $POST['table'];
				$id = $POST['id'];
				foreach ($POST as $key => $value) {
					if ($key != 'action' && $key != 'table' && $key != 'id') {
						$entry[$key] = $value;
					}
				}
						
				if ($POST['action'] == 'insert') {
					insertEntry ($table, $entry);
					$ret .= '<p>Entry Inserted!</p>';
				}
				else if ($POST['action'] == 'update') {
					updateEntry ($table, $id, $entry);
					$ret .= '<p>Entry Updated!</p>';
				}
				else if ($POST['action'] == 'delete') {
					deleteEntry ($table, $id);
					$ret .= '<p>Entry Deleted!</p>';
				}
			}
		
			if (isset($GET['table']) && isset($GET['id'])) {
				$table = $GET['table'];
				$id = $GET['id'];
				if (!empty($table) && !empty($id)) {
					$ret .= editItemForm($table, $id);
				}
			}
		break;
		
		default:
			$ret = getArticle($name);
		break;
	}
	
	return $ret;
}

function getViewForPage ($page, $GET, $POST) {
	$view = '';
	$content = explode(',', $page->content);
	foreach ($content as $item) {
		$view .= '<div class="paragraph-center col-sm-12">';
		$view .= getContent($item, $GET, $POST);
		$view .= '</div>';
	}
	return $view;
}

?>