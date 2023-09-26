
<?php
// ik heb dit gedaan omdat ik een wachtwoord heb op mijn database
// Eerste require proberen
if (require_once('stylefolder\conecting.php')) {
    // De eerste require is geslaagd, voer hier je code uit voor pagina 1
} else {
    // De eerste require is mislukt, probeer de tweede require
    if (require_once('stylefolder\conn.php')) {
        // De tweede require is geslaagd, voer hier je code uit voor pagina 2
    } else {
        // Beide requires zijn mislukt, geef een foutmelding weer
        die("Kan geen van beide pagina's includen.");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

    <?php 
       
       require_once("stylefolder\header.php");
       

       
     require_once("stylefolder\hooter.php");
    ?>

    <?php
    
    
    ?>

</body>
</html>