<?php


class DataBase
	
{
	
    private static  $instance = null;
    private $pdo;
	
    private function __construct()
    {
        // Initialize your database connection here
        $this->pdo = new PDO('mysql:host=localhost;dbname=db3', 'root', '' );
		echo "connected";
    }
     public static function getInstance()
    {
        if (!isset(self::$instance)) 
		{
            self::$instance = new DataBase();
        }

        return self::$instance;
    }
}
$data = DataBase::getInstance();


?>