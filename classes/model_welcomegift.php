<?php
class Model_WelcomeGift{
    private $gift;

    //definieer constantes voor je type
    //TYPE_SAUna = 'type_sauna'
    // gebruik deze binnen en buiten je class

    //Ik heb het nu zo opgelost met een array. Is dit wat je wilde? Ik vind het wel een logische oplossing.

    const TYPE_SAUNA = 'Saunabon';
    const TYPE_WEEKEND_ARRANGEMENT = 'Weekend arrangement';
    const TYPE_EXTREME_FRUITMAND = 'Extreme fruitmand';

    private static $arrangementenArray = array(SELF::TYPE_SAUNA,SELF::TYPE_WEEKEND_ARRANGEMENT,SELF::TYPE_EXTREME_FRUITMAND);



    function __construct(){

        $this->gift = $this->arrangementenArray[rand(1,3)];

    }

    function __get($value){

        if ($value == 'gift'){

                return $this->gift;

        }
    }
}