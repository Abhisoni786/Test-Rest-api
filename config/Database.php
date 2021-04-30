<?php

class Database
{
    private $conn = null;
    private $username = "root";
    private $password = '';
    private $server = 'localhost';
    private $database = "test";
    private static $instance = null;

    public function __construct()
    {
    }


    /**
     * Database::getInstance()->connect()
     */

    public static function getInstance()  # Slington's pattern { Create a class instance with using new keyword }
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }


    public function connect()   # Connect to the database
    {
        try{
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            return $this->conn;
        }catch(PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
            return null;
        }
    }
}
