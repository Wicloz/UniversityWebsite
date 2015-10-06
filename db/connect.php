<?php
$db = new mysqli('mysql.liacs.leidenuniv.nl', 's1704362', 'Biep4Boop', 's1704362');
if ($db->connect_errno) {
	die('Database errors, sorry for the inconvenience.');
}
?>
