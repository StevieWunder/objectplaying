<?php

class Model_WeatherForecast {

    private $registrants = array();

    function __construct(){

    }

    public function register($registrant){

        if (!empty ($registrant) && $registrant instanceof Interface_WeatherForecastRegisterable){

            echo 'Deze object bevat de juiste interface je weet zelluf<br />' ;

            array_push($this->registrants, $registrant);

        }else{

            echo 'Er ging iets mis bij de registratie van dit object<br />';

        }


    }

    public function broadcast(){

        if (!empty($this->registrants)){

            foreach ( $this->registrants as $registrant) {

                $registrant->notify('Het weer is kut in Nederland');

            }

        }else{

            echo 'No registrants yet.<br />';

        }


    }

}