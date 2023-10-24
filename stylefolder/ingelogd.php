<link rel="stylesheet" href="/css/admin.css">


<?php

// als je ingelogd bent dan kan je naar deze pagina gaan
require_once("conecting.php");



session_start();

// Controleer of de gebruiker is ingelogd. Als niet, doorsturen naar de inlogpagina.
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Haal de gebruikersnaam op uit de sessie.
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title> persoonlijke pagina</title>
</head>
<body>
    <main>
    <h2>Welkom, <?php echo $username; ?></h2>


    <!-- Voeg extra inhoud toe aan de persoonlijke pagina zoals gewenst. -->
    <p>Dit is uw persoonlijke pagina. Voeg hier extra inhoud toe.</p>
<!-- dit pagina word de pagina om persoonlijke gegevens te veranderen  -->

    <a href="http://localhost/GitHub/ala-1/index.php">back</a>
    </main>
</body>
</html>

