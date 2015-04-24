<?php
class Model_Shelter extends Model_Building{

    private $name;
    private $opvangMogelijk;
    private $adoptieMogelijk;

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



    function __construct($name, $adoptieMogelijk=0, $opvangMogelijk=0, $width, $length, $height, $street, $streetNumber, $postalCode, $city){

        $this->name=$name;
        $this->adoptieMogelijk =$adoptieMogelijk;
        $this->opvangMogelijk =$opvangMogelijk;


        //onderstaande gaat veranderen door $this->dimension & $this->address. Dezet staan in building gedefinieerd.
        $this->width=$width;
        $this->length=$length;
        $this->height=$height;
        $this->street=$street;
        $this->$streetNumber=$streetNumber;
        $this->postalCode=$postalCode;
        $this->city=$city;
    }

    //is dit public of private?
    function getVolume(){
        return($this->width * $this->length * $this->height);
    }

    function __GET($value){

        if ($value == 'adoptieMogelijk'){

            if (!$this->adoptieMogelijk){

                return 'In dit asiel is helaas geen adoptie mogelijk';

            }elseif($this->adoptieMogelijk){

                return 'In dit asiel is adoptie mogelijk';
            }
        }elseif ($value == 'name'){

            return $this->name;

        }elseif ($value == 'opvangMogelijk') {

            if (!$this->opvangMogelijk) {

                return 'In dit asiel is helaas geen opvang mogelijk';

            } elseif ($this->opvangMogelijk) {

                return 'In dit asiel is opvang mogelijk';
            }
        }
    }
}