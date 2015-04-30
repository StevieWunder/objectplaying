<?php
class Model_Employee{

        private $name;
        public $address;
        private $salary;
        private $jobTitle;
        public $welcomeGift;

    function __construct($name, $address, $salary, $jobTitle){

        $this->name=$name;
        $this->address = $address;
        $this->salary = $salary;
        $this->jobTitle = $jobTitle;
        $this->welcomeGift = new Model_WelcomeGift();

    }

    public function getInfo(){

        return ('Naam: ' . $this->name . '. <br />' .
                'Functie: '. $this->jobTitle . '. <br />' .
                'Het woonadres is: ' . $this->address->getInfo() . '. <br />' .
                'Het salaris is: ' . $this->salary . '. <br />' .
                'Het welkomstgeschenk is: '. $this->welcomeGift->gift . '.<br />');

    }

    function __get($value){

        if ($value == 'name'){

            return $this->name;

        }

        elseif ($value == 'salary'){

            return ('Salaris is geheim');

        }

        elseif ($value == 'jobTitle') {

                return $this->jobTitle;

        }

    }

}