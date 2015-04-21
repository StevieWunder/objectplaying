<?php
class Dog{

    private $name;
    private $race;

    function __construct($name, $race)
    {
        $this->name = $name;
        $this->race = $race;
    }

    public function bark($loudness = 'low')
    {
        if ($loudness == 'high') {
            echo 'BARK BARK BARK';
        }

        if ($loudness == 'low') {
            echo 'bark bark';
        }
    }

    public function insertDog()
    {
        $conn = Db::connect();

        if (!empty($conn)) {
            $query = "INSERT INTO dogs (name, race) VALUES ('" . $this->name . "', '" . $this->race . "')";

            if ($result = mysqli_query($conn, $query)) {
                echo 'success';
            }
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
