<?php
error_reporting(E_ALL);
require 'vendor/smarty/smarty/libs/Smarty.class.php';
require 'app/include.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $smarty = new Smarty;
    #$smarty->debugging = true;
    #$smarty->caching = true;
    #$smarty->cache_lifetime = 120;

    $GET = '';
	foreach ($_GET as $key => $value) {
		if ($key != 'page') {
			$GET[$key] = $value;
		}
	}
    $urlEnd = createFullUrl($_GET['page'], $GET);

    $smarty->assign('topnav', topnav($_GET));
    $smarty->assign('sidenav', sidenav($_GET));

    $pageFile = 'app/pages/'.$_GET['page'].'.php';
    $templateFile = 'templates/pages/'.$_GET['page'].'.tpl';

    if (file_exists($pageFile) && file_exists($templateFile)) {
        require $pageFile;
        $smarty = createPage($smarty);
        $smarty->display($templateFile, $urlEnd);
    }

    else {
        $smarty->assign('error', err_404());
        $smarty->display('templates/error.tpl', $urlEnd);
    }
} else {
	header('Location: ?page=home');
}

function createFullUrl ($page, $get) {
    $url = '?page='.$page;
    if (!empty($get)) {
        foreach ($get as $key => $value) {
            $url .= '&'.$key.'='.$value;
        }
    }
    return $url;
}
?>
