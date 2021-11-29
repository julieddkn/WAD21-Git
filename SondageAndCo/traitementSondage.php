<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // include_once "./config/db.php";
        // include_once "./classes/Sondage.class.php";
        // include_once "./classes/SondageManager.class.php";
        include "./vendor/autoload.php";

        try {
            $bdd = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset='. DBCHARSET, DBUSER, DBPASS);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }  

        $newEntreprise = $_POST["entreprise"];
        $Manager = new SondageManager();

        //var_dump($_POST);
        //echo $_POST["entreprise"];
        //echo $_POST["email"];
        //echo $_FILES["logo"];
    ?>
</body>
</html>