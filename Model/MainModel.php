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



















    function addKp($id, $num){
        $sql = "UPDATE $this->table SET `number_kp`='$num',`date_kp`=now() WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
    function updateMeneger($id, $desc){
        $sql = "UPDATE  $this->table  SET `meneger_id`='$desc' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
   function updateDesc($id, $desc){
        $sql = "UPDATE $this->table SET `desc`='$desc' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    function updateName($id, $name){
        $sql = "UPDATE $this->table SET `name`='$name',`dateMain`=now() WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
    function updateDeskKp($id, $desc){
        $sql = "UPDATE `main` SET `desc_kp`='$desc',`date_kp`=now() WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    function updateDeadline($id, $desc){
        $sql = "UPDATE $this->table SET `deadline`='$desc' WHERE id=$id";
        print $sql;
        $id = $this->db->addAndGetId($sql);
        return $id;
    }
    
    function updateSum($id, $sum){
        $sql = "UPDATE `main` SET `sum`='$sum' WHERE id=$id";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    function getStatusOfReceipt(){
        $sql ='SHOW COLUMNS FROM orderTracking LIKE "statusOfReceipt"';
        $items = $this->db->selectAssoc($sql)[0][Type];

        preg_match('/enum\((.*)\)$/', $items, $matches); //$type-просто возвращаеая строка которую надо распарсить // $matches - куда будет положен результаь
        $vals = explode(',', $matches[1]);
        return $vals;
    }

}
//UPDATE `main` SET `number_kp`=6,`date_kp`=7 WHERE id=1
