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





        case 'updateDesc':
            $resp = json_decode($value);
            print $mains->updateDesc($resp->id, $resp->desc);
            //            print $value;
            break;
        case 'updateName':
            $resp = json_decode($value);
            print $mains->updateName($resp->id, $resp->name);
            //            print $value;
            break;
        case 'updateDescKp':
            $resp = json_decode($value);
            print $mains->updateDeskKp($resp->id, $resp->descKp);
            break;
        case 'createItem':
            print $mains->createItem();
            //            print $value;
            break;
        case 'updateDeadline':
            print $mains->updateDeadline($resp->id, $resp->deadline);
//                        print $value;
            break;

        case 'updateSum':
            $resp = json_decode($value);
            print $mains->updateSum($resp->id, $resp->sum);
            break;
    }
}

exit();