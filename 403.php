<?php
require_once 'app/core/init.php';
require_once 'main.php';
$smarty = new Smarty;

$smarty->debugging = Config::get('debug/smartyDebug');
$smarty->caching = Config::get('smarty/caching');
$smarty->cache_lifetime = Config::get('smarty/cache_lifetime');
$cache_id = md5(json_encode($_GET).json_encode($_POST).Notifications::getAsJson());

if(!$smarty->isCached('templates/errors/403.tpl', $cache_id)) {
    $smarty = pageAddMain($smarty);
}
$smarty = pageAddMessages($smarty);

$smarty->loadFilter("output", "trimwhitespace");
$smarty->display('templates/errors/403.tpl', $cache_id);
?>
