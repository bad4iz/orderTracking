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



    }
}

exit();