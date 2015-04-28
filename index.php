<?php
    include 'classes/model_address.php';
    include 'classes/model_volume.php';
    include 'classes/model_welcomegift.php';
    include 'classes/model_employee.php';
    include 'classes/model_dog.php';
    include 'classes/model_building.php';
    include 'classes/model_shelter.php';
    include 'classes/model_layout.php';

    //onderstaande 2 constanten voor testdoeleinden om te veranderen
    $employeeCount=5;
    $dogCount=10;


//    echo '<a href="forms/adddog.html">Add a dog in the database</a><P>';




    //aanmaken van Shelter

    $shelterAddress = new Model_Address('Barkstreet', 1, '12345', 'DogVille');
    $shelterVolume = new Model_Volume(3,4.5,8);
    $dogShelter = new Model_Shelter($shelterVolume, $shelterAddress, 'The happy dog', 0, 1);
    echo $dogShelter->showAllDogInfo();
    $dogShelter->showAllEmployeeInfo();

    //aanmaken van hond voordat er Employees zijn:

    $dog1 = new Model_Dog('Bogey','Boogiewoogie dog', 8);
    $dogShelter->addDog($dog1);

    //aanmaken van employees

    $employeeAddress = new Model_Address('Workstreet', 2, '12345', 'Dogville');
    $shelterEmployee1 = new Model_Employee('Bert',$employeeAddress, 3000, 'Dogguard');
    $dogShelter->addEmployee($shelterEmployee1);

    $employeeAddress = new Model_Address('Workstreet', 3, '12345', 'Dogville');
    $shelterEmployee2 = new Model_Employee('Ernie',$employeeAddress, 3000, 'Dogguard');
    $dogShelter->addEmployee($shelterEmployee2);

    for ($i = 0; $i<=$employeeCount; $i++){
        $employeeAddress = new Model_Address('Workstreet', rand(4,1000), '12345', 'Dogville');
        $empArray[$i] = new Model_Employee('RandMederker'.$i,$employeeAddress,2000,'DogGuard');
        $dogShelter->addEmployee($empArray[$i]);
    }

    Model_Layout::lineBreak();
    echo '<p />';
    //aanmaken van honden nadat er employees zijn opgenomen

    $dog2 = new Model_Dog('Chuck Berry Doggy the third','Boogiewoogie dog', 8);
    $dogShelter->addDog($dog2);
    $dog3 = new Model_Dog('Tiesto','Trance dog', 10);
    $dogShelter->addDog($dog3);
    $dog4 = new Model_Dog('Snoopy','Animated dog', 2);
    $dogShelter->addDog($dog4);
    $dog5 = new Model_Dog('Droopy','Animated dog', 2);
    $dogShelter->addDog($dog5);
    $dog6 = new Model_Dog('Van Buuren','Trance dog', 10);
    $dogShelter->addDog($dog6);
    $dog7 = new Model_Dog('Van Dyk','Trance dog', 10);

    for ($i = 0; $i<=$dogCount; $i++){
    $dogArray[$i] = new Model_Dog('ArrayDoggie'.$i ,'Array dog race', rand(1,10));
    $dogShelter->addDog($dogArray[$i]);
    }



    //doe iets met bovenstaande info

    echo 'De gegevens van hondenasiel met naam \'' . $dogShelter->name . '\' zijn:<br />';
    Model_Layout::lineBreak();
    echo 'Het adres is ' . $dogShelter->address->getAddress() . '<br />';
    echo $dogShelter->adoptionPossible . '.<br />';
    echo $dogShelter->shelterPossible . '.<br />';
    echo 'Het volume van het hondenAsiel is:' . $dogShelter->volume->getVolume() . ' kuub.<br />';
    Model_Layout::lineBreak();
    echo $dogShelter->showAllDogInfo();
    Model_Layout::lineBreak('Alle Employee info');
    $dogShelter->showAllEmployeeInfo();
    echo '<HR>';
?>