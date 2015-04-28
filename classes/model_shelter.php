<?php
class Model_Shelter extends Model_Building{

    private $name;
    private $shelterPossible;
    private $adoptionPossible;

    private $employees = array();
    private $dogs = array();

    public static $numberOfDogs = 0;
    public static $numberOfEmployees = 0;
    public static $maximumNumberOfDogsPerEmployee = 3;

    function __construct($volume, $address, $name, $employee, $shelterPossible=0, $adoptionPossible=0){

        $this->address = $address;
        $this->volume = $volume;
        $this->name = $name;
        $this->adoptionPossible = $adoptionPossible;
        $this->shelterPossible = $shelterPossible;
        $this->constructor_message();

    }

    private function constructor_message(){

        Model_Layout::lineBreak('Shelter');
        echo 'Shelter constructor message: Shelter \'' . $this->name . '\' is created.<br />';
        Model_Layout::lineBreak();

    }

    public function addDog($dog){

        if (self::dogSpacePossible()) {
            //push hier de dog in de dogs array, zoek op: array push php
            array_push($this->dogs, $dog);
            self::$numberOfDogs++;
            echo 'The number of dogs in shelter \'' . $this->name . '\' has increased to ' . self::$numberOfDogs . ' dogs.<br />';

        }
        else {

            echo 'Geen hond toegevoegd wegens medewerkergebrek<br />';

        }

    }

    public function removeDog($dog){
        //loop met een foreach loop door de dogs array

        foreach($this->dogs as $key => $value) {

            // if dog is gelijk aan value\
            // remove die dog uit de array
            // dogcount--

        }

    }


    public function getDogByName($name){

        //loop door de dogs en zoek op de naam
        //return deze.

    }

    public function showAllDogInfo(){
        if (!empty($this->dogs)){
            $returnString = NULL;
            reset($this->dogs);
            foreach($this->dogs as $key => $value){

                $returnString = $returnString . $this->dogs[$key]->name . ' ' . $this->dogs[$key]->race . ' is barking on level '. $this->dogs[$key]->bark();

            }
            return $returnString;
        }

        else return 'Geen honden aanwezig in dit asiel.<br />';
    }

    public function addEmployee($employee){

        array_push($this->employees, $employee);
        self::$numberOfEmployees++;
        echo 'The number of employees in shelter \'' . $this->name . '\' has increased to ' . self::$numberOfEmployees . ' employees.<br />';

    }

    private static function dogSpacePossible(){

        return((self::$numberOfEmployees*self::$maximumNumberOfDogsPerEmployee)-self::$numberOfDogs);

    }

    public function showAllEmployeeInfo(){
        if (!empty($this->employees)){

            reset($this->employees);
            foreach($this->employees as $key => $value){
                Model_Layout::lineBreak();
                echo 'De gegevens van de werknemer zijn:<br />';
                Model_Layout::lineBreak();
                echo 'Naam: ' . $this->employees[$key]->name . '. <br />';
                echo 'Functie: '. $this->employees[$key]->jobTitle . '. <br />';
                echo 'Het woonadres is: ' . $this->employees[$key]->address->getAddress() . '. <br />';
                echo $this->employees[$key]->salary . '. <br />';
                echo 'Het welkomstgeschenk is: '. $this->employees[$key]->welcomeGift->gift . '. <br />';
            }
        }

        else echo 'Geen employees aanwezig in dit asiel.<br />';
    }

    //hetzelfde kan je doen voor eployees.
    // je kunt ook een maximaal aantal honder per employee toelaten. Als er maar een mens is dan kunnen er bv max drie honden worden toegevoegd.

    // check ook http://laravel.com/
    // hoe het beste te installeren? nieuwe repo klaar zetten etc


    function __get($value){

        if ($value == 'adoptionPossible'){

            if (!$this->adoptionPossible){

                return 'In dit asiel is helaas geen adoptie mogelijk';

            }elseif($this->adoptionPossible){

                return 'In dit asiel is adoptie mogelijk';
            }
        }elseif ($value == 'name'){

            return $this->name;

        }elseif ($value == 'shelterPossible') {

            if (!$this->shelterPossible) {

                return 'In dit asiel is helaas geen opvang mogelijk';

            } elseif ($this->shelterPossible) {

                return 'In dit asiel is opvang mogelijk';
            }
        }
    }
}