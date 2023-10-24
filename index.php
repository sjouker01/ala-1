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
    
       if (isset($_SESSION['gebruikersnaam'])) {
           $gebruikersnaam = $_SESSION['gebruikersnaam'];
           echo "Welkom, $gebruikersnaam! <br>";
           echo "<a href='warehouse.php'>overzicht van producten</a> <br>";
           echo "<a href='stylefolder/toevoege.php'>product toevoegen</a> <br>";
       } else {
           echo "Welkom, gast!";
       }
       
    //    welkom pagina 
    // hier worden mensen verwelkomt en kunnen ze inloggen  
     require_once("stylefolder\hooter.php");
    ?>

    <?php
    
    
    ?>

</body>
</html>