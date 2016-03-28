<?php
error_reporting(0);
require_once 'vendor/smarty/smarty/libs/Smarty.class.php';
require_once 'app/core/init.php';
$smarty = new Smarty;

$smarty->caching = Config::get('smarty/caching');
$smarty->cache_lifetime = Config::get('smarty/cache_lifetime');
$cache_id = md5(json_encode($_GET).json_encode($_POST).Session::getCacheId());

if(!$smarty->isCached('templates/errors/404.tpl', $cache_id)) {
    $smarty->assign('topnav', topnav($_GET));
    $smarty->assign('sidenav', sidenav($_GET));
}
if (true) {
    $smarty->assign('successes', Session::flashRead('successes'));
    $smarty->assign('infos', Session::flashRead('info'));
    $smarty->assign('warnings', Session::flashRead('warnings'));
    $smarty->assign('errors', Session::flashRead('errors'));
}
$smarty->display('templates/errors/404.tpl', $cache_id);
?>
