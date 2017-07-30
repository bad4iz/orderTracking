<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 18.04.2017
 * Time: 16:13
 */

use exel\model\MainModel;

$post = $_POST;

$mains = new MainModel();

$accessModel = new \exel\model\Access();

foreach ($_POST as $key => $value) {
    $resp = json_decode($value);


    switch ($key) {

        //установка создания создания заявки
        case 'setDateMain':
            print $mains->setDateMain($resp->id, $resp->dateMain);
            break;

        case 'setInitiator':
            $resp = json_decode($value);
            print $mains->updateInitiator($resp->id, $resp->initiator);
            break;

        case 'setProductName':
            $resp = json_decode($value);
            print $mains->setProductName($resp->id, $resp->productName);
            break;
// поставщик
        case 'setSupplier':
            $resp = json_decode($value);
            print $mains->setSupplier($resp->id, $resp->supplier);
            break;

//стоимость товара по наклодной
        case 'setCost':
            $resp = json_decode($value);
            print $mains->setCost($resp->id, $resp->cost);
            break;

//ориентировачная дата поставки
        case 'setEstimatedDeliveryDate':
            $resp = json_decode($value);
            print $mains->setEstimatedDeliveryDate($resp->id, $resp->estimatedDeliveryDate);
            break;

//номер склада
        case 'setWarehouseNumber':
            $resp = json_decode($value);
            print $mains->setWarehouseNumber($resp->id, $resp->warehouseNumber);
            break;

// статус получения
        case 'setStatusOfReceipt':
            $resp = json_decode($value);
            print $mains->setStatusOfReceipt($resp->id, $resp->statusOfReceipt);
            break;

// комертарии статуса
        case 'setСommentsStatus':
            $resp = json_decode($value);
            print $mains->setСommentsStatus($resp->id, $resp->сommentsStatus);
            break;


// оприодован
        case 'setСapitalized':
            $resp = json_decode($value);
            print $mains->setСapitalized($resp->id, $resp->capitalized);
            break;

        case 'createItem':
            print $mains->createItem();
        //            print $value;

// admin
        case 'admin':
            $resp =($value);
            print $accessModel
            print $mains->setСapitalized($resp->id, $resp->capitalized);
            break;



    }
}

exit();