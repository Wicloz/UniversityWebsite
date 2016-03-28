<?php
class Redirect {
    public static function to ($target) {
        header("Location: {$target}");
        exit();
    }

    public static function error ($code) {
        switch ($code) {
            case 404:
                header('HTTP/1.0 404 Not found');
                include '404.php';
            break;
        }
        exit();
    }
}
?>
