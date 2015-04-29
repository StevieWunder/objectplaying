<?php
    include 'classes/model_address.php';
    include 'classes/model_volume.php';
    include 'classes/model_welcomegift.php';
    include 'classes/model_employee.php';
    include 'classes/model_dog.php';
    include 'classes/model_building.php';
    include 'classes/model_shelter.php';
    include 'classes/model_layout.php';

    //onderstaande 4 constanten zijn puur en alleen voor testdoeleinden. Deze kunnen op deze plek gewijzigd worden
    $employeeCount=4;
    $dogCount=25;
    $opTeZoekenNaam1 = 'Dog Doe';
    $opTeZoekenNaam2 = 'Tiesto';


//    echo '<a href="forms/adddog.html">Add a dog in the database</a><P>';




    //aanmaken van Shelter

    $shelterAddress = new Model_Address('Barkstreet', 1, '12345', 'DogVille');
    $shelterVolume = new Model_Volume(3,4.5,8);
    $dogShelter = new Model_Shelter($shelterVolume, $shelterAddress, 'The happy dog', 0, 1);
    echo $dogShelter->showAllDogInfo();
    $dogShelter->showAllEmployeeInfo();
    Model_Layout::lineBreak();

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
        $empArray[$i] = new Model_Employee('RandomMedewerker'.$i,$employeeAddress,2000,'DogGuard');
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
    $dogShelter->addDog($dog7);

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
    Model_Layout::lineBreak('Honjes verwijderen');
    $dogShelter->removeDog($dog7,1);
    $dogShelter->removeDog($dogArray[3],1);
    $dogShelter->removeDog($dogArray[$dogCount],0);
    Model_Layout::lineBreak('Hondjes opzoeken');

    $findDoggie1 = $dogShelter->getDogByName($opTeZoekenNaam1);
    if (!empty($findDoggie1)){

        echo $findDoggie1->name .'<br />';
        echo $findDoggie1->race .'<br />';
        echo $findDoggie1->bark() .'<br />';

    }else{

        echo 'Deze hondennaam bestaat niet in dit asiel<br />';

    }

    $findDoggie2 = $dogShelter->getDogByName($opTeZoekenNaam2);
    if (!empty($findDoggie2)){

        echo $findDoggie2->name .'<br />';
        echo $findDoggie2->race .'<br />';
        echo $findDoggie2->bark() .'<br />';

    }else{

        echo 'Deze hondennaam bestaat niet in dit asiel<br />';

    }


?>