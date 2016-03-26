<?php
require 'data.php';

function getPageForId ($id) {
	$pages = getAllEntries('pages');
	while ($row = $pages->fetch_object()) {
		if ($row->id == $id) {
			return $row->file;
		}
	}
}
?>
