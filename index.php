<?php
require_once 'app/core/init.php';
require_once 'main.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $smarty = new Smarty;
    $smarty->debugging = Config::get('debug/smartyDebug');
    $smarty->caching = Config::get('smarty/caching');
    $smarty->cache_lifetime = Config::get('smarty/cache_lifetime');

    $cache_id = md5(json_encode($_GET).json_encode($_POST).Notifications::getAsJson());
    $pageFile = 'app/pages/'.$_GET['page'].'.php';
    $templateFile = 'templates/pages/'.$_GET['page'].'.tpl';

    if (file_exists($pageFile) && file_exists($templateFile)) {
        require $pageFile;
        if($pageHasRandom || !$smarty->isCached($templateFile, $cache_id)) {
            $smarty = createPage($smarty);
            $smarty = pageAddMain($smarty);
        }
        $smarty = pageAddMessages($smarty);
        $smarty->loadFilter("output", "trimwhitespace");
        $smarty->display($templateFile, $cache_id);
    }

    else {
        Redirect::error(404);
    }
} else {
	Redirect::to('?page=home');
}
?>
