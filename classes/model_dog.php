<?php
class Model_Dog{

    private $name;
    private $race;

    function __construct($name, $race){

        $this->name = $name;
        $this->race = $race;

    }

    public function bark($loudness = 'low'){

        if ($loudness == 'high') {
            echo 'BARK BARK BARK';
        }
        if ($loudness == 'low') {
            echo 'bark bark';
        }

    }

   public static function forge($name, $race){
        $conn = Db::connect();
        $query = "SELECT * from dogs WHERE name = '" . $name . "' AND race = '" . $race . "'";
        $result = mysqli_query($conn, $query);

        // als we data hebben dan maken we een leeg hond model aan, vullen hem met data en returnen hem
        if ($result->num_rows){
            $dog = new Model_Dog($name, $race);
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
            $query = "INSERT INTO dogs (name, race) VALUES ('" . $this->name . "', '" . $this->race . "')";
            if ($result = mysqli_query($conn, $query)) {
                echo 'Hond is toegevoegd';
            }
        }
    }

//    public function __get($value){
//
//        if ($value == 'race') {
//            return $this->race;
//
//        } elseif ($value == 'name') {
//            return $this->name;
//        }
//
//    }

}
