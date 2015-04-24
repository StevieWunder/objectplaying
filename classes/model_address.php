<?php
class Model_Address{

    public $street;
    public $streetNumber;
    public $postalCode;
    public $city;

    function __construct($street, $streetNumber, $postalCode, $city){
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->postalCode = $postalCode;
        $this->city = $city;
    }

    public function getAddress(){
        return($this->street . ' ' . $this->streetNumber . ', ' . $this->postalCode. ' ' .$this->city);
    }

}