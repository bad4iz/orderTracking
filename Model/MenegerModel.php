<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 18.04.2017
 * Time: 13:21
 */

namespace exel\model;


class MenegerModel extends ExelDb {
    private $table = 'menegers';

    function getAll() {
        $sql = "SELECT IDUser as menegers_id, name as meneger_name , femaly as meneger_femaly  FROM `user`";
        $items = $this->dbGeo->selectAssoc($sql);
        return $items;
    }

    function createItem($name) {
        $sql = "INSERT INTO $this->table (name) VALUES ('$name')";
        $id = $this->db->addAndGetId($sql);
        return $id;
    }

    /**
     * вывод менеджерво комерческого отдела по доступу 10
     * @return array|null
     */
    function getAllMenegerKom() {
        $sql = "SELECT IDUser as menegers_id, name as meneger_name , femaly as meneger_femaly  FROM `user` WHERE access='10' ";
        $items = $this->dbGeo->selectAssoc($sql);
        return $items;
    }



}