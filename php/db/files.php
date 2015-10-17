<?php

function writeToFile ($file, $content) {
	if (true) {
		$handle = fopen($file, 'w');
		fwrite($handle, $content);
		fclose($handle);
	}
}

function createPageFile ($page) {
	$pageName = str_replace('.php', '', $page);
	writeToFile($page, "<?php\n\terror_reporting(E_ALL);\n\trequire 'php/mixer.php';\n\tgetPageByName('{$pageName}');\n?>\n");
}

function removeFile ($file) {
	if (file_exists($file)) {
		unlink($file);
	}
}

?>
