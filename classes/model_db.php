<?php

class Model_Db{

    //connectie maken naar de database

    //Singleton

    private $connection;
    private static $_instance;
    private $hostname = self::HOSTNAME;
    private $username = self::USERNAME;
    private $password = self::PASSWORD;
    private $databaseName = self::DATABASENAME;

    const HOSTNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'root';
    const DATABASENAME = 'barkthedog';

    private function __construct(){

        $this->connection =  new mysqli($this->hostname, $this->username, $this->password);

        if ($this->connection->connect_error) {

            die("Connection failed: " . $this->connection->connect_error);
        }

        mysqli_select_db($this->connection, $this->databaseName);

        echo "Connectie met barkthedog. Hoorah! <br />";

        return $this->connection;
    }

    public static function connect(){

        if (!isset(self::$_instance)){
            self::$_instance = new Model_db;
            return self::$_instance;
        }

    }

    protected function __clone(){

    }

}