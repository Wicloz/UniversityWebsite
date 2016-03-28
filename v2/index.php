<?php
error_reporting(E_ALL);
require_once 'vendor/smarty/smarty/libs/Smarty.class.php';
require_once 'app/core/init.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $smarty = new Smarty;
    #$smarty->debugging = true;
    $smarty->caching = Config::get('smarty/caching');
    $smarty->cache_lifetime = Config::get('smarty/cache_lifetime');

    $cache_id = md5(json_encode($_GET).json_encode($_POST).Session::getCacheId());
    $pageFile = 'app/pages/'.$_GET['page'].'.php';
    $templateFile = 'templates/pages/'.$_GET['page'].'.tpl';

    if (file_exists($pageFile) && file_exists($templateFile)) {
        require $pageFile;
        if($pageHasRandom || !$smarty->isCached($templateFile, $cache_id)) {
            $smarty->assign('username', User::currentData()->name);
            $smarty->assign('topnav', topnav($_GET));
            $smarty->assign('sidenav', sidenav($_GET));
            $smarty = createPage($smarty);
        }
        if (true) {
            $smarty->assign('successes', Session::flashRead('successes'));
            $smarty->assign('infos', Session::flashRead('info'));
            $smarty->assign('warnings', Session::flashRead('warnings'));
            $smarty->assign('errors', Session::flashRead('errors'));
        }
        $smarty->display($templateFile, $cache_id);
    }

    else {
        Redirect::error(404);
    }
} else {
	Redirect::to('?page=home');
}
?>
