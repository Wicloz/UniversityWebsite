<?php
require 'views.php';

function getPageName ($filename, $GET) {
	$filename = str_replace('_item', '', $filename);
	
	if (!empty($GET)) {
		$end = '?';
		foreach ($GET as $key => $value) {
			$end .= $key.'='.$value;
		}
	} else {
		$end = '';
	}
	
	return $filename.$end;
}

function getPageByName ($page) {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->file == $page.'.php') {
			$page = $row;
			break;
		}
	}
	
	if ($page) {
		echo '<!DOCTYPE html><html lang="en">';
		echo headContent();
		
		echo '<body>';
		echo headerContent();
		echo mainnavContent(getPageName($page->file, $_GET));
		
		echo '<div class="container-fluid" id="content"><div class="row">';
		echo '<div class="col-sm-2" id="content-right">';
		echo leftnavContent(getPageName($page->file, $_GET));
		echo '</div>';
		echo '<div class="col-sm-8" id="content-main">';
		echo getViewForPage ($page, $_GET, $_POST, $_FILES);
		echo '</div>';
		echo '<div class="col-sm-2" id="content-left">';
		echo '</div>';
		echo '</div></div>';
		
		echo footerContent();
		echo '</body></html>';
	} else {
		header('Location: 404');
	}
}

?>