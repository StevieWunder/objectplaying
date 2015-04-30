<?php

class Model_Db{

    //connectie maken naar de database

    //Alvast bezig deze class OO te maken, alleen nog niet mee getest

    private $hostname;
    private $username;
    private $password;
    private $connection;

    const HOSTNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'root';

    function __construct(){

        $this->hostname = SELF::HOSTNAME;
        $this->username = SELF::USERNAME;
        $this->password = SELF::PASSWORD;

    }

    public function connect(){

        $this->connection = new mysqli($this->hostname, $this->username, $this->password);

        if ($this->connection->connect_error) {

            die("Connection failed: " . $this->connection->connect_error);

        }

        mysqli_select_db($this->connection , 'barkthedog' );

        echo "Connectie met barkthedog. Hoorah! <br />";

        return $this->connection;

    }
}