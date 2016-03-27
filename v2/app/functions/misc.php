<?php
function arrayToUrlString ($array) {
    $urlString = '';
    if (!empty($array)) {
        foreach ($array as $key => $value) {
            $urlString .= '&'.$key.'='.$value;
        }
    }
    return $urlString;
}
?>
