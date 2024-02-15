<?php

namespace Model;

abstract class Connect {

    const HOST = "db";
    const DB = "cinema_v2";
    const USER = "root";
    const PASS = "";

    public static function dbConnect() {
        try {
            phpinfo();die;
            return new \PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8", self::USER, self::PASS);

        } catch(\PDOException $ex) {
            return $ex->getMessage();

        }
    }



}

?>