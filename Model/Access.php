<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 30.07.2017
 * Time: 0:32
 */

namespace exel\model;


class Access extends ExelDb {
    private $table = 'accessUser';

    function __construct() {
        $this->users = new User();

        $sql = "CREATE TABLE IF NOT EXISTS `access` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `access` VARCHAR(250) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $this->db->addAndGetId($sql);



        $sql = "CREATE TABLE IF NOT EXISTS `accessUser` ( `idUser` INT NOT NULL , `idAccess` INT NOT NULL , UNIQUE (`idUser`)) ENGINE = InnoDB;";
        $this->db->addAndGetId($sql);


    }


}