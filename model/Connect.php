<?php

namespace Model;

abstract class Connect {
    const HOST = 'localhost:3307';
    const DB = 'cinema_v2';
    const USER = 'root';
    const PASS = '';

    public static function dbConnect() {

        // var_dump(new \PDO('mysql:host='.self::HOST.'dbname='.self::DB.';charset=utf8',self::USER,self::PASS));die;


        phpinfo();die;
        // try {
        //     return new PDO('mysql:host='.self::HOST.'dbname='.self::DB.';charset=utf8',self::USER,self::PASS);
        // } catch(\PDOException $ex) {
        //     return $ex->getMessage();
        // }

        }
    }

?>