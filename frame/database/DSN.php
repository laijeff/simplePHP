<?php
class DSN
{
    private static $instance;
    private function __construct()
    {
    }
    //连接PDO
    public static function Connect()
    {
        if(self::$instance == null)
        {
            $dsn="mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DBNAME.";port=".MYSQL_PORT;
            $pdo=new PDO($dsn, MYSQL_USER, MYSQL_PASS, array(PDO::ATTR_PERSISTENT=>true));
            self::$instance = $pdo;
        }
        return self::$instance;
    }
}
