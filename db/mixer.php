<?php
require 'views.php';

function cleanFileName ($filename) {
	return str_replace('_item', '', str_replace('.php', '', $filename));
}

function getPageByName ($name) {
	$pages = getAllEntries ('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->name == $name) {
			$page = $row;
			break;
		}
	}
	
	if ($page) {
		echo '<!DOCTYPE html><html lang="en">';
		echo headContent();
		echo headerContent();
		echo '<body>';
		echo mainnavContent(cleanFileName($page->file));
		echo '<div class="container-fluid" id="content"><div class="row">';
		
		echo '<div class="col-sm-2" id="content-right">';
		echo leftnavContent(cleanFileName($page->file));
		echo '</div>';
		echo '<div class="col-sm-8" id="content-main">';
		echo getViewForPage ($page, $_GET, $_POST);
		echo '</div>';
		echo '<div class="col-sm-2" id="content-left">';
		echo '</div>';
					
		echo '</div></div>';
		echo '</body></html>';
	} else {
		header('Location: 404');
	}
}

?>