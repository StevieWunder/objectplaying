<?php
class Model_Dog{

    private $name;
    private $race;
    private $loudness;

    function __construct($name, $race, $loudness){

        $this->name = $name;
        $this->race = $race;
        $this->loudness = $loudness;

    }

    public function bark(){

        if ($this->loudness >=6) {

            return $this->loudness . ' BARK BARK.<br />' ;

        }elseif($this->loudness <6) {

            return $this->loudness . ' bark bark.<br />' ;

        }

    }

    public function __get($value){

        if ($value == 'race') {

            return $this->race;

        } elseif ($value == 'name') {

            return $this->name;
        }

    }

}



/*
 * public static function forge($name, $race, $loudness){

        $conn = Db::connect();
        $query = "SELECT * from dogs WHERE name = '" . $name . "' AND race = '" . $race . "'";
        $result = mysqli_query($conn, $query);

        // als we data hebben dan maken we een leeg hond model aan, vullen hem met data en returnen hem
        if ($result->num_rows){

            $dog = new Model_Dog($name, $race, $loudness);

        }
        else {
            // zo niet, pech gehad, we returnen null
            $dog = null;

        }

        return $dog;

    }

    public function save(){

        $conn = Db::connect();

        if (!empty($conn)) {

            $query = "INSERT INTO dogs (name, race, loudness) VALUES ('" . $this->name . "', '" . $this->race . "', '" . $this->name . ".)"; //hier nog ff kijken naar de sql.. of die klopt.

            if ($result = mysqli_query($conn, $query)) {

                echo 'Hond is toegevoegd';

            }
        }

    }

 * */