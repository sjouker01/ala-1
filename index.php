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
       require_once("stylefolder\conecting.php");
       require_once("stylefolder\header.php");

       
     require_once("stylefolder\hooter.php");
    ?>

    <?php require_once 'stylefolder\inlogen.php'; ?>
    <h2>Inloggen</h2>
    <form action="login.php" method="post">
        Gebruikersnaam: <input type="text" name="gebruikersnaam"><br>
        Wachtwoord: <input type="password" name="wachtwoord"><br>
        <input type="submit" value="Inloggen">
    </form>

</body>
</html>