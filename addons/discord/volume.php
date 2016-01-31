<?php
require 'connection.php';
if (isset($_GET['force']) && $_GET['force'] == 'true') {
    echo(getVolume(true));
}
else {
    echo(getVolume());
}
?>