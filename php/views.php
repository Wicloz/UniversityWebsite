<?php
require 'items.php';
require 'errors.php';

function getContent ($name, $GET, $POST, $FILES) {
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
		
		case 'table_events';
			$ret .= '<h2>Events:</h2>';
			$ret .= getTableEvents('', true);
		break;
		
		case 'item_assignment';
			if (isset($GET['id']) && !empty($GET['id'])) {
				$ret .= getItemAssignment($GET['id']);
			}
		break;
		
		case 'form_editItem';
			if (isset($POST['action']) && isset($POST['table']) && isset($POST['id']) && !empty($POST['action']) && !empty($POST['table']) && !empty($POST['id'])) {
				foreach ($POST as $key => $value) {
					if ($key != 'action' && $key != 'table' && $key != 'id') {
						$entry[$key] = $value;
					}
				}
				$ret .= editDataItem($POST['table'], $POST['id'], $POST['action'], $entry);
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
		
		case 'form_uploadAny';
			if (isset($FILES['file']['name']) && isset($POST['target']) && !empty($FILES['file']['name']) && !empty($POST['target'])) {
				$ret .= uploadFileAny($FILES, $POST['target']);
			}
			$ret .= getUploadFileForm();
		break;
		
		case 'list_subjectOverview';
			$ret .= getSubjectOverview();
		break;
		
		default:
			$ret .= '<p class="message-error">Content with name \''.$name.'\' not found.</p>';
		break;
	}
	
	if (strpos($name, 'article_') !== false) {
		$ret = getArticle($name);
	}
	
	return $ret;
}

function getViewForPage ($page, $GET, $POST, $FILES) {
	$view = '';
	$content = explode(',', str_replace(', ', ',', $page->content));
	foreach ($content as $item) {
		$view .= '<div class="paragraph-center col-sm-12">';
		$view .= getContent($item, $GET, $POST, $FILES);
		$view .= '</div>';
	}
	return $view;
}

?>
