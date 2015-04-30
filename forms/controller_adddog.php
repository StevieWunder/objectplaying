<?php
    include '../classes/model_dog.php';
    include '../classes/model_db.php';
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

    if (!empty($dogName) &&!empty($dogRace)) {

        //De gebruiker heeft via een form een naam en een ras gestuurd. We  gaan op zoek naar een hond die hierbij past:

        $vindHondje = model_dog::forge($dogName, $dogRace);

        // Het kan zijn dat deze hond 'null' is, check model dog regel 55. IN dat geval hebben we niet zo'n hond.
        // Hier checken we op:

        // SP: En in het geval we niet zo'n hond hebben gaan we dus inserten, want hij bestaat nog niet.

        if (empty($vindHondje)) {
            $hondje = new Model_Dog($dogName, $dogRace, $loudness);
            //Onderstaande comment van TOM even laten staan: Is nu niet van belang omdat we alleen willen saven als het gaat om een hond die nog niet bestaat in dit voorbeeld.
            //In een ander voorbeeld zullen we kijken dat we de hond gaan updaten indien deze is gevonden.

            // TOM: Nu weten we zeker dat we een hond hebben, of uit de database of een nieuwe, we kunnen nu opslaan.
            $hondje->save();
        } else {
            echo 'Deze dog bestaat al en kan niet 2 keer bestaan.<BR>';
            echo 'Klik op deze link om opniew een hondje toe te voegen: ';
            echo '<a href="../forms/adddog.html">Hond toevoegen</a>';
        }
    }else{
        echo 'Niet alle waarden zijn ingevuld.<BR>';
        echo 'Klik op deze link om opniew een hondje toe te voegen: ';
        echo '<a href="../forms/adddog.html">Hond toevoegen</a>';
    }



?>
</body>
</html>
