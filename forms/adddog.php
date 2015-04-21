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
    $hondje->insertDog();
?>
</body>
</html>
