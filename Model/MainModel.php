<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 18.04.2017
 * Time: 10:44
 */

namespace exel\model;


use MongoDB\BSON\Type;

class MainModel extends ExelDb {
    private $table = 'orderTracking';

    function getAll() {
        $sql = "SELECT * FROM orderTracking
                     LEFT JOIN geo.user as user ON  (orderTracking.initiator =  user.IDUser)";
        $items = $this->db->selectAssoc($sql);
        return $items;
    }

    function createItem() {
        $sql = "INSERT INTO $this->table () VALUES ()";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
    function setDateMain($id, $dateMain){
        $sql = "UPDATE $this->table SET `date`='$dateMain' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    // инициатор в базу
   function updateInitiator($id, $initiator){
        $sql = "UPDATE $this->table SET `initiator`='$initiator' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    // наименование товара (общее)
   function setProductName($id, $productName){
        $sql = "UPDATE $this->table SET `productName`='$productName' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    // поставщик
   function setSupplier($id, $supplier){
        $sql = "UPDATE $this->table SET `supplier`='$supplier' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
 // стоимость товара по наклодной
   function setCost($id, $cost){
        $sql = "UPDATE $this->table SET `cost`='$cost' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
 // ориентировачная дата поставки
   function setEstimatedDeliveryDate($id, $estimatedDeliveryDate){
        $sql = "UPDATE $this->table SET `estimatedDeliveryDate`='$estimatedDeliveryDate' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }


 // номер склада
   function setWarehouseNumber($id, $warehouseNumber){
        $sql = "UPDATE $this->table SET `warehouseNumber`='$warehouseNumber' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

 // статус получения
   function setStatusOfReceipt($id, $statusOfReceipt){
        $sql = "UPDATE $this->table SET `statusOfReceipt`='$statusOfReceipt' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }


    // комертарии статуса
    function setСommentsStatus($id, $сommentsStatus){
        $sql = "UPDATE $this->table SET `commentsStatus`='{$сommentsStatus}' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

}
//UPDATE `main` SET `number_kp`=6,`date_kp`=7 WHERE id=1
