<?php
function createPage ($smarty) {
    $data = DB::instance()->get("navigation", array("", "name", "=", "Home", "OR", "1", "=", "1"));
    $results = '';

    foreach ($data->results() as $result) {
        $results .= $result->name.'<br>';
    }

    #$results .= $data->first()->name;

    DB::instance()->update("users", 2, array(
        'name' => 'test2',
        'password' => '1234'
    ));

    $smarty->assign('test', $results);
    return $smarty;
}
?>
