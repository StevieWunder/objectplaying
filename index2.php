<?php

// index2 voor testen met interfaces

include 'classes/model_address.php';
include 'classes/model_welcomegift.php';
include 'classes/model_employee.php';
include 'classes/model_dog.php';
include 'classes/model_weatherforecast.php';

$address = new Model_Address('Dogstreet', 12 ,'12345', 'SomeVille');
$employee = new Model_Employee('Achmed',$address,'2000','Dogguard');

$dog = new Model_Dog('Lambik','Belgian Dog', 10);

$weatherForecast = new Model_WeatherForecast();

$weatherForecast->broadcast();

$weatherForecast->register($address); //gaat niet lukken
$weatherForecast->register($employee); //gaat wel lukken
$weatherForecast->register($dog); //gaat wel lukken

$weatherForecast->broadcast();