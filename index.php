<?php
    require_once("stylefolder\conecting.php");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

    <?php 
       
       

       
       require_once("stylefolder\header.php");
    //  hier kijkt die naar of er iemand al ingelogd is of niet zo wel dan laat die de naam van de gene zien en zo niet laat die gast zien
    // hier word ook als je ingelogt bent de 2 keuzens geshowd 1tje om de producte te zien en de ander de toevoegpagina
    if (isset($_SESSION['gebruikersnaam'])) {
        $gebruikersnaam = $_SESSION['gebruikersnaam'];
        echo "Welkom, <a href='stylefolder/personlijkpagina.php'>$gebruikersnaam</a>! <br>";
        echo "<a href='stylefolder/warehouse.php'>Overzicht van producten</a> <br>";
        echo "<a href='stylefolder/toevoege.php'>Product toevoegen</a> <br>";
    } else {
        echo "Welkom, gast!";
        echo "als iet wil doen moet je inlooggen <br>";
    }
    
       
    //    welkom pagina 
    // hier worden mensen verwelkomt en kunnen ze inloggen  
     require_once("stylefolder\hooter.php");
    ?>

    <?php
    
    
    ?>

</body>
</html>