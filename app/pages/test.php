<?php
$allowCaching = false;
function createPage ($smarty) {
    if (exec('echo TEST') == 'TEST') {
        echo 'Exec Works!<br>';
    }

    if (file_exists('app/classes/anime/test.py')) {
        echo 'File Exists!<br>';
        echo exec('python app/classes/anime/test.py');
        $command = escapeshellcmd('app/classes/anime/test.py');
        $output = shell_exec($command);
        echo $output;
    }

    return $smarty;
}
?>
