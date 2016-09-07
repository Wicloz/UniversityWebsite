<?php
function arrayToUrlString ($array) {
    $urlString = '';
    if (!empty($array)) {
        foreach ($array as $key => $value) {
            if (empty($urlString)) {
                $urlString .= '?';
            } else {
                $urlString .= '&';
            }
            $urlString .= $key.'='.$value;
        }
    }
    return $urlString;
}

function extractFields ($dataObjects, $field) {
    $values = array();
    foreach ($dataObjects as $dataObject) {
        $dataArray = (array) $dataObject;
        $values[] = $dataArray[$field];
    }
    return $values;
}
?>
