<?php
class Model_Shelter extends Model_Building{

    private $name;
    private $shelterPossible;
    private $adoptionPossible;
    public $employee;
    // waarschijnlijk zijn er meerdere employees, dus dan krijg je denk ik zoiets:
    //private $employee = array();
    //private $dog = array();

    /*

    Onderstaande constructor functie heeft erg veel parameters. Dat werkt wel maar werkt in de praktij niet erg fijn.
    Ook in het kader van 'object thinking' kunnen we dingen hier versimpelen. In dit geval zou ik voorstllen dat we een
    Address Object gaan meesturen en een Dimension Object.

    We gaan dan van:

    function __construct($name, $adoptieMogelijk=0, $opvangMogelijk=0, $width, $length, $height, $street, $streetNumber, $postalCode, $city){

    naar:

    function __construct($name, $dimension, $adress, $adoptieMogelijk=0, $opvangMogelijk=0)

    Opmerkingen:

    - Zorg dat je in het engels blijft werken qua parameters.
    - Je ziet duidelijk welke constructor functie leesbaarder is, nietwaar?
    - Ik heb alvast twee nieuwe modellen aangemaakt: address en dimension, deze kan je verder afmaken.
    - Zorg dat je in building twee extra class variabelen toevoegd: $dimension en $address en stel deze in in de constructor zoals je ook de naam instelt.
    - Aan de buitenkant initieer je een shelter op deze manier:

    $dimension = new Dimension(...)
    $address = new Address(..)
    $shelter = new Shelter('name', $address, $dimension, .., ..);

    Dat is mooier (en later beter te snappen als je terug kijkt) dan:

    $shelter = new Shelter($name, $adoptieMogelijk=0, $opvangMogelijk=0, $width, $length, $height, $street, $streetNumber, $postalCode, $city)


     */



    function __construct($volume, $address, $name, $employee, $shelterPossible=0, $adoptionPossible=0){
        $this->address = $address;
        $this->volume = $volume;
        $this->name=$name;
        $this->employee = $employee;
        $this->adoptionPossible =$adoptionPossible;
        $this->shelterPossible = $shelterPossible;
    }

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