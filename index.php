<?php
error_reporting(E_ALL);
require 'php/views.php';

function createFullUrl ($page, $GET) {
	$page = str_replace('_item', '', $page);
	
	$end = '';
	if (!empty($GET)) {
		foreach ($GET as $key => $value) {
			$end .= '&'.$key.'='.$value;
		}	
	}
	
	return 'index.php?page='.$page.$end;
}

if (isset($_GET['page']) && !empty($_GET['page'])) {
	$GET = '';
	foreach ($_GET as $key => $value) {
		if ($key != 'page') {
			$GET[$key] = $value;
		}
	}

	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->page == $_GET['page']) {
			$page = $row;
			break;
		}
	}

	if (@$page) {
		echo '<!DOCTYPE html><html lang="en">';
		echo headContent();
		
		echo '<body>';
		echo headerContent();
		echo mainnavContent(createFullUrl($page->page, $GET));
		
		echo '<div class="container-fluid" id="content"><div class="row">';
		echo '<div class="col-sm-2" id="content-right">';
		echo leftnavContent(createFullUrl($page->page, $GET));
		echo '</div>';
		echo '<div class="col-sm-8" id="content-main">';
		echo getViewForPage ($page, $GET, $_POST, $_FILES);
		echo '</div>';
		echo '<div class="col-sm-2" id="content-left">';
		if (strpos($page->page, 'subject_I_') !== false) {
			echo discordSidebarI();
		}
		if (strpos($page->page, 'subject_B_') !== false) {
			echo discordSidebarB();
		}
		echo '</div>';
		echo '</div></div>';
		
		echo footerContent();
		echo '</body></html>';
	}
	
	else {
		echo '<!DOCTYPE html><html lang="en">';
		echo headContent();
		
		echo '<body>';
		echo headerContent();
		echo mainnavContent(createFullUrl('', $GET));
		
		echo '<div class="container-fluid" id="content"><div class="row">';
		echo '<div class="col-sm-2" id="content-right">';
		echo leftnavContent(createFullUrl('', $GET));
		echo '</div>';
		echo '<div class="col-sm-8" id="content-main">';
		echo err_404();
		echo '</div>';
		echo '<div class="col-sm-2" id="content-left">';
		echo '</div>';
		echo '</div></div>';
		
		echo footerContent();
		echo '</body></html>';
	}
	
} else {
	header('Location: index.php?page=home');
}
?>
