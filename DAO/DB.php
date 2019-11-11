<?php

class DB {

    private static $con;

    public static function conexao(){
        if (!isset(self::$con)) {
            try {
                self::$con = new PDO("mysql:host=localhost;dbname=cybercafe", "brenno", "123");
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$con;
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
        }

        return self::$con;
    }

    public static function prepare($sql){
        return $stmt = DB::conexao()->prepare($sql);
    }

    public static function query($sql){
        return $stmt = DB::conexao()->query($sql);
    }
}