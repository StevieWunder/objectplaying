<?php
    include 'classes/model_building.php';
    include 'classes/model_shelter.php';
    echo '<a href="forms/adddog.html">Hond toevoegen</a><P>';
    $hondenAsiel = new Model_Shelter('The happy dog',1, NULL, 3, 4.5, 8, 'Barkstreet', 12, '12345', 'DogVille');
    echo 'De gegevens van hondenasiel met naam \'' . $hondenAsiel->name . '\' zijn:<BR>';
    echo '-------------------------------------------------------------------------<BR>';
    echo '<HR>';
    echo 'Het adres is ' . $hondenAsiel->street . ' ' . $hondenAsiel->streetNumber . ', ' . $hondenAsiel->postalCode . ' ' . $hondenAsiel->city . '.<BR>';
    echo $hondenAsiel->adoptieMogelijk . '.<BR>';
    echo $hondenAsiel->opvangMogelijk . '.<BR>';
    echo 'De inhoud van het hondenAsiel is:' . $hondenAsiel->getVolume() . ' kuub.<BR>';
?>