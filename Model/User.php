<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 17.07.2017
 * Time: 13:08
 */

namespace exel\model;

class User {
    private $db;
    private $users;

    function __construct() {
        $this->db = new Db('geo');
        $this->users = $this->getUsers();

    }

    /**
     * получить юзера по id из класса
     * @param $IDUser
     * @return array
     */
    function getUser($IDUser) {
        $user = array_filter($this->users, function($item) use ($IDUser) {
            return $item["IDUser"] === $IDUser;
        });
        $tmp = [];
        foreach ($user as $value){
            $tmp = $value;
        }
        return $tmp;
    }

    /**
     * получить всех юзеров из базы
     * @return array|null
     */
    function getUsers() {
        $sql = "SELECT IDUser, name, femaly  FROM user ";
        $items = $this->db->selectAssoc($sql);
        return $items;
    }
}

