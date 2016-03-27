<?php
function createPage ($smarty) {
    $data = DB::instance()->get("navigation", array("", "name", "=", "Home", "OR", "1", "=", "1"));
    $results = '';

    foreach ($data->results() as $result) {
        $results .= $result->name.'<br>';
    }

    #$results .= $data->first()->name;

    $smarty->assign('test', $results);
    return $smarty;
}
?>
