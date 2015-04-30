<?php
class Model_Volume{

    public $length;
    public $width;
    public $height;

    function __construct($length=1, $width=1, $height=1){

        $this->length=$length;
        $this->width=$width;
        $this->height=$height;

    }

    public function getVolume(){

        return($this->length * $this->width * $this->height);

    }

}