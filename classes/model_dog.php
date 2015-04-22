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

    /*
    Dit 'getDogByNameRace' zou ik anders doen. Stel je voor je maakt een nieuw dog object en geeft hem een naam via de constructor. Deze methode zit dan op dat object, dat is vreemd. Je maakt er eerst een aan
    en vervolgens ga je hem nog laden.
    wat je beter kan doen is deze methode vervangen door een static methode die je forge noemt.

    //!!Het is aan de class om dog opbjecten op te halen en te retouneren, niet aan het object.//

    public static function forge($name, $race) {

        //1. haal je data op
        //2. check of er data is: !empty(result)
        //3. $dog = new Dog(bul hier met de data) in geval van data, anders een error returnen (google php / errors)
        //4. return dog

        // gebruiken van buitenaf: $droopie = Dog::forge('droopie', 'droopieRas')
    }

    */

    public static function forge($name, $race){
        $conn = Db::connect();
        $query = "SELECT * from dogs WHERE name = '" . $name . "' AND race = '" . $race . "'";
        echo 'De query is : ' . $query . '<BR>';
        $result = mysqli_query($conn, $query);
        if (!$result->num_rows){
            $dog = new Model_Dog($name, $race);
            echo 'Resultaat is empty';
        }
        else{
            $dog = $result;
        }
        return $dog;
    }

    //ik zou niet de term Dog gebruiken hier, je zit immers al in de dog class. Het beste kan je deze save noemen. Zo zal het straks in het framework ook werken.
    public function save(){

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
