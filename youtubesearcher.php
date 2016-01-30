<?php
error_reporting(E_ALL);

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $searchUrl = 'https://www.youtube.com/results?search_query=' . str_replace(' ', '+', $_GET['q']);
    $searchPage = file_get_contents($searchUrl);
    
    $startpos = strpos($searchPage, 'href="/watch?v=');
    $firstPass = str_replace('href="', '', substr($searchPage, $startpos));
    $endpos = strpos($firstPass, '"');
    $secondPass = 'https://www.youtube.com' . substr($firstPass, 0, $endpos);
    
    echo $secondPass;
}

else {
    echo 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
}
?>