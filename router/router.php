<?php
//Router / menegerRouter . php
include($_SERVER['DOCUMENT_ROOT'] . "/orderTracking/bootstrap.php");

switch ($routes[2]) {
    case "menegerRouter":
        include($_SERVER['DOCUMENT_ROOT'] . "/orderTracking/router/menegerRouter.php");
        break;    
    case "":
        $title = 'Отслеживание заказов';
        include($_SERVER['DOCUMENT_ROOT'] . "/core/view/pages/header.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/orderTracking/index.php");
        break;

    default:
        not_found::show();
        break;
}
