<?php
    include 'classes/model_address.php';
    include 'classes/model_volume.php';
    include 'classes/model_welcomegift.php';
    include 'classes/model_employee.php';
    include 'classes/model_building.php';
    include 'classes/model_shelter.php';

    echo '<a href="forms/adddog.html">Add a dog in the database</a><P>';

    $employeeAddress = new Model_Address('Workstreet', 13, '12345', 'Dogville');
    $shelterEmployee = new Model_Employee('Henk',$employeeAddress, 3000, 'Dogguard');
    $shelterAddress = new Model_Address('Barkstreet', 12, '12345', 'DogVille');
    $shelterVolume = new Model_Volume(3,4.5,8);
    $dogShelter = new Model_Shelter($shelterVolume, $shelterAddress, 'The happy dog', $shelterEmployee, 0, 1);

    echo 'De gegevens van hondenasiel met naam \'' . $dogShelter->name . '\' zijn:<BR>';
    echo '-------------------------------------------------------------------------<BR>';
    echo 'Het adres is ' . $dogShelter->address->getAddress() . '<BR>';
    echo $dogShelter->adoptionPossible . '.<BR>';
    echo $dogShelter->shelterPossible . '.<BR>';
    echo 'Het volume van het hondenAsiel is:' . $dogShelter->volume->getVolume() . ' kuub.<BR>';
    echo '<HR>';
    echo 'De gegevens van de werknemer zijn:<BR>';
    echo '-------------------------------------------------------------------------<BR>';
    echo 'Naam: ' . $dogShelter->employee->name . '. <BR>';
    echo 'Functie: '. $dogShelter->employee->jobTitle . '. <BR>';
    echo 'Het woonadres is: ' . $dogShelter->employee->address->getAddress() . '. <BR>';
    echo $dogShelter->employee->salary . '. <BR>';
    //onderstaande 5 keer hetzelfde omdat de randomfunctie alleen bij de constructor is aangeroepen.
    echo 'Het welkomstgeschenk is: '. $dogShelter->employee->welcomeGift->gift . '. <BR>';
    echo 'Het welkomstgeschenk is: '. $dogShelter->employee->welcomeGift->gift . '. <BR>';
    echo 'Het welkomstgeschenk is: '. $dogShelter->employee->welcomeGift->gift . '. <BR>';
    echo 'Het welkomstgeschenk is: '. $dogShelter->employee->welcomeGift->gift . '. <BR>';
    echo 'Het welkomstgeschenk is: '. $dogShelter->employee->welcomeGift->gift . '. <BR>';
?>