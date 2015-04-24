<?php
class Model_WelcomeGift{
    private $gift;

    function __construct(){
        $this->gift = rand(1,3);
    }

    function __get($value){
        if ($value == 'gift'){
            switch ($this->gift){
                case 1: return("saunabon");
                case 2: return("weekendarrangement");
                case 3: return("extremefruitmand");
            }
        }
    }
}