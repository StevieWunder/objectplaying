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

        //De gebruiker heeft via een form een naam en een ras gestuurd. We  gaan op zoek naar een hond die hierbij past:

        $hondje = model_dog::forge($dogName,$dogRace);

        // Het kan zijn dat deze hond 'null' is, check model dog regel 55. IN dat geval hebben we niet zo'n hond.

        // Hier checken we op:

        if (empty($hondje)) {

            $hondje = new Model_Dog($dogName,$dogRace);
        }

        // Nu weten we zeker dat we een hond hebben, of uit de database of een nieuwe, we kunnen nu opslaan.
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
