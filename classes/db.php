<?php

class Db{

    //connectie maken naar de database

    public static function connect(){

        $hostname='localhost';
        $username='root';
        $password = 'root';

        $connection = new mysqli($hostname, $username, $password);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        mysqli_select_db ( $connection , 'barkthedog' );

        echo "Connectie met barkthedog. Hoorah! <br />";

        return $connection;

    }
}