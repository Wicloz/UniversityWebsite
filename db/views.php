<?php
require 'items.php';

function getContent ($name, $GET, $POST) {
	$ret = '';
	
	switch ($name) {
		case 'table_exams';
			$ret .= '<h2>Exams:</h2>';
			$ret .= getTableTentamens();
		break;
		
		case 'table_assignments';
			$ret .= '<h2>Assignments:</h2>';
			$ret .= getTableAssignments();
		break;
		
		case 'item_assignment';
			if (isset($GET['id']) && !empty($GET['id'])) {
				$ret .= getItemAssignment($GET['id']);
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
		
			if (isset($GET['table']) && isset($GET['id']) && !empty($GET['table']) && !empty($GET['id'])) {
				$ret .= getEditItemForm($GET['table'], $GET['id']);
			}
		break;
		
		case 'list_dataItems';
			if (isset($GET['table']) && !empty($GET['table'])) {
				$ret .= getDataItemsList($GET['table']);
			}
		break;
		
		case 'form_login';
			
		break;
		
		default:
			$ret .= "Content with name '{$name}' not found.";
		break;
	}
	
	if (strpos($name, 'article_') !== false) {
		$ret = getArticle($name);
	}
	
	return $ret;
}

function getViewForPage ($page, $GET, $POST) {
	$view = '';
	$content = explode(',', str_replace(', ', ',', $page->content));
	foreach ($content as $item) {
		$view .= '<div class="paragraph-center col-sm-12">';
		$view .= getContent($item, $GET, $POST);
		$view .= '</div>';
	}
	return $view;
}

?>
