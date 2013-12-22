<?php
class DB
{
    private static $instance;
    private function __construct()
    {
    }
    public static function Connect()
    {
        if(self::$instance == null)
        {
            $dsn="mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DBNAME;
            $pdo=new PDO($dsn, MYSQL_USER, MYSQL_PASS, array(PDO::ATTR_PERSISTENT=>true));
        }
        return self::$instance;
    }

    public function query($sql)
    {
        $pdo = self::Connect();
        return $pdo->query($sql);
    }

}
