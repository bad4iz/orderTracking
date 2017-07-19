<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 17.07.2017
 * Time: 19:58
 */

namespace exel\model;


class Warehouse extends ExelDb {

    function getAll() {
        $sql = "SELECT * FROM warehouse ";
        $items = $this->db->selectAssoc($sql);
        return $items;
    }
}