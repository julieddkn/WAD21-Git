<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo OOP</title>
</head>
<body>
    <h1>Exo PHP OOP.</h1>

    <?php

        include ("./classes/PersonneP.class.php");
        $personneTest = new PersonneP();
        $personneTest -> setNom("De Deken");
        $personneTest -> setPrenom("Julie");
        $personneTest -> setStatus("Ok");
        $personneTest -> showPerson();

    ?>

</body>
</html>