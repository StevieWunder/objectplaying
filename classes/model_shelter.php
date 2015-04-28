<?php
class Model_Shelter extends Model_Building{

    private $name;
    private $shelterPossible;
    private $adoptionPossible;
    public $employee;

    private $employees = array();
    private $dogs = array();

    function __construct($volume, $address, $name, $employee, $shelterPossible=0, $adoptionPossible=0){
        $this->address = $address;
        $this->volume = $volume;
        $this->name=$name;
        $this->employee = $employee;
        $this->adoptionPossible =$adoptionPossible;
        $this->shelterPossible = $shelterPossible;
    }

    public function addDog($dog)
    {
        //push hier de dog in de dogs array, zoek op: array push php
    }

    public function removeDog($dog)
    {
        //loop met een foreach loop door de dogs array

        foreach($this->dogs as $key => $value) {

            // if dog is gelijk aan value\
            // remove die dog uit de array
        }
    }

    public function getDogByName($name)
    {
        //loop door de dogs en zoek op de naam
        //return deze.
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