<?php

class Conexao {

    public static $conn;

    public static function conectar() {
        try {
            if (!isset(self::$conn)) {
                self::$conn = new PDO("mysql:host=localhost;dbname=coopertral;charset=utf8", "root", "");
                #self::$conn = new PDO("mysql:host=localhost;dbname=coopera3_coopertral;charset=utf8","coopera3_coop","coopertral");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
