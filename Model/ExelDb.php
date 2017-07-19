<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 18.04.2017
 * Time: 10:43
 */

namespace exel\model;


class ExelDb {
    protected $db;
    protected $dbGeo;
    function __construct() {
        $this->db = new Db('orderTracking');
        $this->dbGeo = new Db('geo');
    }
}
