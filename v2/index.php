<?php
require 'vendor/smarty/smarty/libs/Smarty.class.php';
$smarty = new Smarty;

$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('templates/main.tpl');
?>