<?php
    include '../classes/model_dog.php';
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
           dan pas inserten. nders gaat het mis.
        }

        Valideren van user input is een heel belangrijk iets in programmeren.
        Je moet te allen tijde controleren of er waardes zijn en of ze van het type zijn dat je verwacht.
        Dit ook / vooral ivm veiligheid.

     *
     *
     */

    if (!empty($dogName) &&!empty($dogRace)){
        $hondje = model_dog::forge($dogName,$dogRace);
        //Ik doe nog even geen check of $hondje een object of een error is. Dus feitelijk werkt het nu als je een hond toevoegt die nog niet bestaat.
        $hondje->save();
    }
    else{
        echo 'Niet alle waarden zijn ingevuld.<BR>';
        echo 'Klik op deze link om opniew een hondje toe te voegen: ';
        echo '<a href="../forms/adddog.html">Hond toevoegen</a>';
    }



?>
</body>
</html>
