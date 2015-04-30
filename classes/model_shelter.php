<?php
class Model_Shelter extends Model_Building{

    //goed goed
    private $name;
    private $shelterPossible;
    private $adoptionPossible;

    private $employees = array();
    private $dogs = array();

    //hier zou ik constants van maken. Dat zijn variabelen die niet veranderen.
    //const REASON_DECEASED = 'reason_removed';
    //const REASON_ADOPTED = 'reason_adopted';
    //te gebruiken buiten het model: Model_Shelter::REASEON_DECEASED
    //te gebruiken binnen het model: self::REASEON_DECEASED
    private static $reasonRemoved = array(0 =>'Deceased', 1 =>'Adopted');

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

        //Model_Layout...ik snap de gedachte maar houd er rekening mee dat straks (en nu eigenlijk ook) modellen alleen maar data vertegenwoordigen en functies bevatten die iets met die data doen.
        //Algemene logica zit in je controllers en je views geven data weer aan de user. Een linebreak is dus iets wat je eigenlijk alleen in de view gaat tegen komen, niet in een model.
        //Maar dat gaat straks vanzelf duidelijker worden als je met MVC gaat werken.

        Model_Layout::lineBreak('Shelter');
        echo 'Shelter constructor message: Shelter \'' . $this->name . '\' is created.<br />';
        Model_Layout::lineBreak();

    }

    public function addDog($dog){

        //hier verwacht je een bool maar je krijgt een int. Eigenlijk zeg je dan if(6) wat altijd true retouneert.
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

    //hier kan je voor reason gebruik maken van de constanten hierboven
    //van buiten af ziet het er zo uit $shelter->removeDog($dog, Model_Shelter::REASEON_DECEASED)

    public function removeDog($dog, $reason=1){
        //loop met een foreach loop door de dogs array
        //je kan met 0 en 1 werken, maar beter is true en false -> betere leesbaarheid.
        $found=0;
        foreach($this->dogs as $key => $value) {

            if ($this->dogs[$key]->name==$dog->name){

                unset($this->dogs[$key]);
                self::$numberOfDogs--;
                $found=1;
                echo 'Dog ' . $dog->name . ' succesfully removed from Shelter, with reason ' . self::$reasonRemoved[$reason].'<br />';
                echo 'The number of dogs in shelter \'' . $this->name . '\' has decreased to ' . self::$numberOfDogs . ' dogs.<br />';
            }
        }

        if (!$found){
            echo 'This doggy with name ' . $dog->name . ' does not exist within this Shelter<br />';
        }
    }


    public function getDogByName($name){

        //loop door de dogs en zoek op de naam
        //return deze.

        foreach($this->dogs as $key => $value) {
            if ($this->dogs[$key]->name==$name){
                return($this->dogs[$key]);
            }
        }

        return null;
    }

    //denk een beetje aan de leesbaarheid, af en toe een lege regel kan geen kwaad.
    public function showAllDogInfo(){
        if (!empty($this->dogs)){

            //initieer hier al een string: $returnString = ''; ipv $returnString = NULL je gaat immers stringen er aan toe voegen.
            $returnString = NULL;
            reset($this->dogs);

            foreach($this->dogs as $key => $value){

                //wat ook kan is deze notatie: $returnString .= $this->dogs[$key]->name . ' ' . $this->dogs[$key]->race . ' is barking on level '. $this->dogs[$key]->bark();
                $returnString = $returnString . $this->dogs[$key]->name . ' ' . $this->dogs[$key]->race . ' is barking on level '. $this->dogs[$key]->bark();

            }
            return $returnString;
        }

        else return 'Geen honden aanwezig in dit asiel.<br />';
    }

    public function addEmployee($employee){

        //check (!empty($employee){ en push dan pas. Eventueel kan je ook testen of het object wel een een employee is =>

        //if (!empty($employee) && $employee instanceof Model_Employee) {}
        // zo weet je zeker dat je data goed is. Wees ten alle tijden kritisch met dat wat binnenkomt. Denk daarbij vooral na over waar de data vandaan komt. User input? of input vanuit het programma zelf.
        //User input moet uiteraard veel beter gechecked worden.


        array_push($this->employees, $employee);
        self::$numberOfEmployees++;
        echo 'The number of employees in shelter \'' . $this->name . '\' has increased to ' . self::$numberOfEmployees . ' employees.<br />';

    }

    private static function dogSpacePossible(){

        //als ik me niet vergis dan retouneert dit een integer?
        //een  functie als deze moet een bool retouneren, true or false
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


                //Wat ik zou doen in plaats van bovenstaande echo's is dit:  echo $employee->getInfo();
                //Zou hou je alles clean, objecten mogen zichzelf beschrijven.
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