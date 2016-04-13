<?php
$allowCaching = false;
function createPage ($smarty) {
    if (exec('echo TEST') == 'TEST') {
        echo 'exec works!';
    }
    return $smarty;
}
?>
