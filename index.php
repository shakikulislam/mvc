<?php
include 'inc/header.php';
include 'system/libs/main.php';
include 'system/libs/sController.php';
include 'system/libs/load.php';
include 'system/libs/dbModel.php';
include 'system/libs/database.php';
?>


<?php

$url = isset($_GET['url']) ? $_GET['url'] : NULL;



if ($url != NULL) {
    $url = rtrim($url, "/");
    $url = explode("/", filter_var($url, FILTER_SANITIZE_URL));
} else {
    unset($url);
}

if (isset($url[0])) {
    include 'app/controllers/' . $url[0] . '.php';
    $obj = new $url[0]();

    if (isset($url[2])) {
        $mdl = $url[1];
        $val = $url[2];
        $obj->$mdl($val);
    } else {
        if (isset($url[1])) {
            $mdl = $url[1];
            $obj->$mdl();
        } else {
            # code...
        }
    }
} else {
    include 'app/controllers/index.php';
    $obj = new Index();
    $obj->home();
}


?>











<?php
include 'inc/footer.php';
?>