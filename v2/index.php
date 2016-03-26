<?php
require 'vendor/smarty/smarty/libs/Smarty.class.php';
require 'app/include.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $smarty = new Smarty;
    #$smarty->caching = true;
    #$smarty->cache_lifetime = 120;
    
    $GET = '';
	foreach ($_GET as $key => $value) {
		if ($key != 'page') {
			$GET[$key] = $value;
		}
	}
    
    $smarty->assign('topnav', topnav($_GET));
    $smarty->assign('sidenav', sidenav($_GET));
    
    $pageFile = 'app/pages/'.$_GET['page'].'.php';
    $templateFile = 'templates/pages/'.$_GET['page'].'.tpl';
    
    if (file_exists($pageFile) && file_exists($templateFile)) {
        require $pageFile;
        $smarty = createPage($smarty);
        $smarty->display($templateFile);
    }
    
    else {
        $smarty->assign('error', err_404());
        $smarty->display('templates/error.tpl');
    }
} else {
	header('Location: ?page=home');
}
?>