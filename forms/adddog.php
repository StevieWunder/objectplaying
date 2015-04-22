<?php
    include '../classes/dog.php';
    include '../classes/db.php';
?>
<html>
<head>
    <title>
        Afhandeling hond toevoegen
    </title>
</head>
<body>
<?php

    $dogName =$_POST['name'];
    $dogRace =$_POST['race'];


    /*
     *
     * Hier eerst checken of deze waardes wel bestaan.
     *  if (!empty($dogName && !empty(...))){
           dan pas inserten. anders gaat het mis.
        }

        Valideren van user input is een heel belangrijk iets in programmeren.
        Je moet ten alle tijden controleren of er waardes zijn en of ze van het type zijn dat je verwacht.
        Dit ook / vooral ivm veiligheid.

     *
     *
     */


    $hondje= new Dog($dogName,$dogRace);

    if (!$hondje->getDogByNameRace()){
        $hondje->insertDog();
    }else{
        echo 'Deze hond bestaat al.<BR>';
        echo 'Klik op deze link om opniew een hondje toe te voegen: ';
        echo '<a href="../forms/adddog.html">Hond toevoegen</a>';
    }

?>
</body>
</html>
