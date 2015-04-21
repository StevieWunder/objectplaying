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
