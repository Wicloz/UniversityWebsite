<?php
require 'vendor/smarty/smarty/libs/Smarty.class.php';
require 'app/include.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $smarty = new Smarty;
    $smarty->caching = true;
    $smarty->cache_lifetime = 120;
    
    $templateFile = 'templates/pages/'.$_GET['page'].'.tpl';
    if (file_exists($templateFile)) {
        $smarty->assign('topnav', topnav($_GET['page']));
        $smarty->assign('sidenav', sidenav($_GET['page']));
        $smarty->display($templateFile);
    } else {
        $smarty->assign('error', err_404());
        $smarty->display('templates/error.tpl');
    }
} else {
	header('Location: ?page=home');
}
?>