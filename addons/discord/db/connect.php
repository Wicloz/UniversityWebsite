<?php
require 'dbsettings.php';

$db = new mysqli($db_ip, $db_username, $db_password, $db_dbname);
if ($db->connect_errno) {
	die('Database errors, sorry for the inconvenience.');
}
?>
