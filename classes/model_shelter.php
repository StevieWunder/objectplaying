<?php
class Model_Shelter extends Model_Building{

    private $name;
    private $opvangMogelijk;
    private $adoptieMogelijk;

    function __construct($name, $adoptieMogelijk=0, $opvangMogelijk=0, $width, $length, $height, $street, $streetNumber, $postalCode, $city){
        $this->name=$name;
        $this->adoptieMogelijk =$adoptieMogelijk;
        $this->opvangMogelijk =$opvangMogelijk;
        $this->width=$width;
        $this->length=$length;
        $this->height=$height;
        $this->street=$street;
        $this->$streetNumber=$streetNumber;
        $this->postalCode=$postalCode;
        $this->city=$city;
    }

    function getVolume(){
        return($this->width*$this->length*$this->height);
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