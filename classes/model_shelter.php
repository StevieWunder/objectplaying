<?php
class Model_Shelter extends Model_Building{

    //goed goed
    private $name;
    private $shelterPossible;
    private $adoptionPossible;

    private $employees = array();
    private $dogs = array();

    const REASON_DECEASED = 'Hond overleden';
    const REASON_ADOPTED = 'Hond gedaopteerd';

    public static $numberOfDogs = 0;
    public static $numberOfEmployees = 0;
    public static $maximumNumberOfDogsPerEmployee = 3;

    function __construct($volume, $address, $name, $employee, $shelterPossible=0, $adoptionPossible=0){

        $this->address = $address;
        $this->volume = $volume;
        $this->name = $name;
        $this->adoptionPossible = $adoptionPossible;
        $this->shelterPossible = $shelterPossible;

    }

    public function addEmployee($employee){

        //User input moet veel beter gechecked worden dan programmainput.

        if (!empty($employee) && $employee instanceof Model_Employee) {

            array_push($this->employees, $employee);
            self::$numberOfEmployees++;

        }

    }

    public function getAllEmployeeInfo(){

        $infoString = 'Geen employees werkzaam.<br />';

        if (!empty($this->employees)) {

            $infoString = '';

            reset($this->employees);

            foreach ($this->employees as $key => $value) {

                //$this->employees[$key]->getInfo(); moet worden $value->getInfo()

                //Je kunt ook dit doen:

                //foreach ($this->employees as $employee) {
                //    $infoString .= $employee->getInfo();
                //}

                $infoString .= $this->employees[$key]->getInfo();

            }
        }

        return $infoString;

    }

    public function addDog($dog){

        if (!empty($dog) && $dog instanceof Model_Dog && self::dogSpacePossible()) {

            array_push($this->dogs, $dog);
            self::$numberOfDogs++;

            return true;

        }
        else {

            return false;

        }
    }

    public function removeDog($dog){

        $found=false;

        foreach($this->dogs as $key => $value) {

            if ($this->dogs[$key]->name==$dog->name){

                unset($this->dogs[$key]);
                self::$numberOfDogs--;
                $found=true;

                break;

            }

        }

        return ($found);

    }


    public function getDogByName($name){

        //loop door de dogs en zoek op de naam
        //return deze.
        if (!empty($this->dogs)) {


            //zelfde als hierboven (foreach $this->dogs as $dog, niet met de key weer in dearray gaan zoeken.

            foreach ($this->dogs as $key => $value) {

                if ($this->dogs[$key]->name == $name) {

                    return ($this->dogs[$key]);

                }
            }

            //de foreach loop is gevonden. De hond is niet gevonden dus returnen we null;

            return null;

        } else{

            // er is geen hond aanwezig;

            return null;

        }

    }

    public function getAllDogInfo(){

        $infoString='Geen honden aanwezig';

        if (!empty($this->dogs)){

            //initieer hier al een string: $returnString = ''; ipv $returnString = NULL je gaat immers stringen er aan toe voegen.
            //strrrrrrrrrrrrrrrrrring.

            $infoString = '';
            reset($this->dogs);

            foreach($this->dogs as $key => $value){

                //same same
                $infoString .= $this->dogs[$key]->getInfo();

            }

        }

        return $infoString;

    }

    private static function dogSpacePossible(){

        if (((self::$numberOfEmployees*self::$maximumNumberOfDogsPerEmployee)-self::$numberOfDogs)>0){

            return true;

        }else{

            return false;

        }

    }

    public function getInfo(){

        return ('Naam: ' . $this->name . '. <br />' .
            $this->getValues('adoptionPossible') . '.<br />' .
            $this->getValues('shelterPossisble') . '.<br />'.
            $this->getAllEmployeeInfo()) .
            $this->getAllDogInfo();

    }

    //magic get uitgedund en enkele values in een zelfgemaakte getfunctie gezet

    public function getValues($value){

        if ($value == 'adoptionPossible'){

            if (!$this->adoptionPossible){

                return 'In dit asiel is helaas geen adoptie mogelijk';

            }elseif($this->adoptionPossible){

                return 'In dit asiel is adoptie mogelijk';

            }
        }elseif ($value == 'shelterPossible') {

            if (!$this->shelterPossible) {

                return 'In dit asiel is helaas geen opvang mogelijk';

            } elseif ($this->shelterPossible) {

                return 'In dit asiel is opvang mogelijk';

            }
        }
        return 'Er klopt iets niet';
    }

    function __get($value)
    {
        if ($value == 'name') {
            return $this->name;

        }
    }
}


/*
 *
 *
 *
 *  NIEUWE UITDAGING
 *
 * Ga op zoek naar het singleton design pattern in PHP. Dat is slechts een enkele class. Maak daarmee een director object.
 *
 * Een singleton design pattern beschrijft een object waar er ten alle tijden maar een van mag zijn.
 *
 * Zoek op het nu hiervan, en de implementatie.
 *
 */