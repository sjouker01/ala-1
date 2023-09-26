<?php
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
    <title>Persoonlijke Pagina</title>
</head>
<body>
    <h2>Welkom, <?php echo $username; ?></h2>
    <!-- Voeg extra inhoud toe aan de persoonlijke pagina zoals gewenst. -->
    <p>Dit is uw persoonlijke pagina. Voeg hier extra inhoud toe.</p>


    <a href="http://localhost/GitHub/ala-1/index.php">back</a>

</body>
</html>

