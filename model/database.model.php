<?php

class Database
{
    private static $dsn = "mysql:host=localhost;dbname=work_complete";

    private static $username = "root";

    private static $password = "";

    private static $db;

    private function __construct()
    {

    }

    public static function connect()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo"Something went wrong!";
                echo $e->getMessage();
                die();
            }
        }
        return self::$db;
    }
}