<?php
require_once 'vendor/smarty/smarty/libs/Smarty.class.php';
require_once 'app/core/init.php';
require_once 'main.php';
$smarty = new Smarty;

$smarty->caching = Config::get('smarty/caching');
$smarty->cache_lifetime = Config::get('smarty/cache_lifetime');
$cache_id = md5(json_encode($_GET).json_encode($_POST).Session::getCacheId());

if(!$smarty->isCached('templates/errors/403.tpl', $cache_id)) {
    $smarty = pageAddMain($smarty);
}
$smarty = pageAddMessages($smarty);

$smarty->display('templates/errors/403.tpl', $cache_id);
?>
