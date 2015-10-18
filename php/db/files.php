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

function uploadFileAny ($FILES, $target) {
	$tmp_name = $FILES['file']['tmp_name'];
	
	if (move_uploaded_file($tmp_name, $target)) {
		return 'File Uploaded!';
	} else {
		return 'Upload Failed!';
	}
}

function uploadFileMedia ($FILES, $subfolder) {
	$name = $FILES['file']['name'];
	$extension = strtolower(substr($name, strpos($name, '.') + 1));
	$type = $FILES['file']['type'];
	$size = $FILES['file']['size'];
	
	$accepted_types = array('image/jpeg', 'image/png', 'image/gif');
	$accepted_extensions = array('jpg', 'jpeg', 'png', 'gif');
	$max_size = 2097152;
	
	$tmp_name = $FILES['file']['tmp_name'];
	$target = 'media/'.$subfolder.'/'.$name;
	
	if (in_array($extension, $accepted_extensions) && in_array($type, $accepted_types)) {
		if ($size <= $max_size) {
			$exists = false;
			if (file_exists($target)) {
				$exists = true;
			}
			
			if (move_uploaded_file($tmp_name, $target)) {
				
				$entry['file'] = $target;
				if ($exists) {
					$table = getAllEntries('media');
					while ($row = $table->fetch_object()) {
						if ($row->file == $target) {
							$id = $row->id;
							break;
						}
					}
					updateEntry('media', $id, $entry);
				} else {
					insertEntry('media', $entry);	
				}
				
				return 'File Uploaded!';
			} else {
				return 'Upload Failed!';
			}
		} else {
			return 'File to big! '.$size.' > '.$max_size;
		}
	} else {
		return 'Invalid file type!';
	}
}

?>
