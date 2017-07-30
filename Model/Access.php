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

        parent::__construct();
//        $this->users = new User();

        $sql = "CREATE TABLE IF NOT EXISTS `access` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `access` VARCHAR(250) NOT NULL , UNIQUE(`access`), PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $this->db->select($sql);

        $sql = "INSERT INTO `access` (`id`, `access`) VALUES (1, 'администратор'), (2, 'внесение даты прихода с отправкой SMS');";
        $this->db->addAndGetId($sql);

        $sql = "CREATE TABLE IF NOT EXISTS $this->table ( `idUser` INT NOT NULL , `idAccess` INT NOT NULL , UNIQUE (`idUser`)) ENGINE = InnoDB;";
        $this->db->addAndGetId($sql);

    }

    function addAccessUser($idUser, $idAccess){
        $sql = "INSERT INTO $this->table (`idUser`, `idAccess`) VALUES ($idUser, $idAccess);";
        return $this->db->addAndGetId($sql);
    }

    function getUsersByAccess($idAccess){
        $sql = "SELECT accessUser.idUser, user.name, user.femaly FROM `accessUser` 
                    JOIN geo.user user ON user.IDUser=accessUser.idUser
                    WHERE idAccess=$idAccess";
        return $this->db->selectAssoc($sql);
    }

    function delete($idUser){
        $sql = "DELETE FROM `accessUser` WHERE idUser=$idUser";
        return $this->db->addAndGetId($sql);
    }

    function getAccessByUser($idUser){
        $sql = "SELECT idAccess FROM `accessUser` WHERE idUser=$idUser";
        return $this->db->selectAssoc($sql)[0]['idAccess'];
    }

}