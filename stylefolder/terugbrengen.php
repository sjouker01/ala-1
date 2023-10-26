<?php
// detailpagina.php
require_once("conecting.php");
// Haal de ID op uit de URL
$iditemuser = $_GET['id'];

// Voer een nieuwe query uit om de gegevens van deze specifieke persoon op te halen
$sql = "SELECT naam, achternaam, studentnummer, duur, product, hoeveelheid FROM itemusers WHERE iditemuser = $iditemuser";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Toon de gegevens van deze persoon
    echo "naam: " . $row['naam'] . "<br>";
    echo "achternaam: " . $row['achternaam'] . "<br>";
    echo "studentnummer: " . $row['studentnummer'] . "<br>";
    echo "duur: " . $row['duur'] . "<br>";
    echo "product: " . $row['product'] . "<br>";
    echo "hoeveelheid: " . $row['hoeveelheid'] . "<br>";

    // Voeg een formulier toe om de duur van de lening aan te passen of terugbrengen aan te geven
    echo "<form action='update.php' method='post'>";
    echo "Nieuwe duur van lening: <input type='text' name='nieuwe_duur'><br>";
    echo "Teruggebracht: <input type='checkbox' name='teruggebracht'><br>";
    echo "<input type='submit' value='Opslaan'>";
    echo "</form>";
} else {
    echo "Persoon niet gevonden.";
}
?>