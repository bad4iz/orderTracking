<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 18.04.2017
 * Time: 10:39
 */

namespace exel\model;


class Db {
    private $link;

    function __construct($bd_name, $mirrorDb) {
        $db_base = $bd_name;
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $this->link = mysqli_connect($db_host, $db_user, $db_pass, $db_base);
        $this->linkMirror = mysqli_connect($db_host, $db_user, $db_pass, $mirrorDb);

    }

    function select_one($par) {
        return mysqli_fetch_array(mysqli_query($this->link, $par));
    }

    function select($par) {
        $result = mysqli_query($this->link, $par);
        $array = array();
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    function exist($par) {
        $result = mysqli_num_rows(mysqli_query($this->link, $par));
        if ($result == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     *  добавить запись и получить id
     * @param $par
     * @return bool|int|string
     */
    function addAndGetId($par) { //
        $result = mysqli_query($this->link, $par);

        mysqli_query($this->linkMirror, $par); // зеркало

        if (!$result) {
            return false;
        }

        return mysqli_insert_id($this->link);
    }

    /**
     * @param $par
     * @return array|null
     */
    function selectAssoc($par) {
        $result2 = mysqli_query($this->linkMirror, $par);   // зеркало
        mysqli_fetch_all($result2, MYSQLI_ASSOC); // зеркало


        $result = mysqli_query($this->link, $par);
        $arrayAssoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arrayAssoc;
    }

    function sql($par) {
        mysqli_query($this->linkMirror, $par);   // зеркало
        mysqli_query($this->link, $par);
    }

    /**
     * @param $par
     * @return int|string
     */
    function delete($par) {
        mysqli_query($this->link, $par);
        return mysqli_insert_id($this->link);
    }
}
