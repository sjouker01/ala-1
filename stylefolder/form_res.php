<!DOCTYPE html>
<html>
<head>
    <title>Uitleenformulier</title>
</head>
<body>
<form method="post" action="">
    <label for="voornaam">Voornaam:</label>
    <input type="text" id="voornaam" name="voornaam" required><br>

    <label for="achternaam">Achternaam:</label>
    <input type="text" id="achternaam" name="achternaam" required><br>

    <label for="studentnummer">Studentnummer:</label>
    <input type="text" id="studentnummer" name="studentnummer" required><br>

    <label for="duur">Duur (in dagen):</label>
    <input type="date" id="duur" name="duur" required><br>


    <label for="hoeveelheid">Hoeveelheid:</label>
    <input type="number" id="hoeveelheid" name="hoeveelheid" required><br> <!-- Nieuwe invoer voor de hoeveelheid -->

    <input type="submit" value="Uitlenen">
</form>

</body>
</html>
<?php
require_once("conecting.php");

if (isset($_GET['itemID'])) {
    $product_id = $_GET['itemID'];
    $sql = "SELECT * FROM items WHERE ItemID = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows >0){
        $row = $result->fetch_assoc();
        $product = $row['NaamVanHetItem'];
    } else {
        echo "error met vinden van product";
        header("refresh:1;url=../warehouse.php");
    }
} else {
    echo "error met vinden van product";
    header("refresh:1;url=../warehouse.php");
}


$naam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$studentnummer = $_POST['studentnummer'];
$duur = $_POST['duur'];
$hoeveelheid = $_POST['hoeveelheid'];

// product is met de if els gedaan

$sql_voorraad_check =  "SELECT AantalBeschikbaar FROM items WHERE ItemID = $product_id";
$result_voorraad_check = $conn->query($sql_voorraad_check);


if ($result_voorraad_check->num_rows > 0) {
    $row = $result_voorraad_check->fetch_assoc();
    $beschikbare_voorraad = $row['AantalBeschikbaar'];
    if ($hoeveelheid > $beschikbare_voorraad) {
        echo "Niet genoeg voorraad beschikbaar.";
        
    }
} else {
    echo "Product niet gevonden.";
    exit;
}


$sql = "INSERT INTO itemusers ( naam, achternaam, studentnummer, duur, hoeveelheid, product) VALUES ('$naam', '$achternaam', '$studentnummer', '$duur', '$hoeveelheid', '$product')";
if ($conn->query($sql) === TRUE) {
    echo "uitgeleend";
    header("refresh:1;url=../index.php");
} else {
    echo "fout bij uitlenen: " . $sql . "<br>" . $conn->error;
}


$sql_update_voorraad = "UPDATE items SET AantalBeschikbaar = AantalBeschikbaar - $hoeveelheid WHERE ItemID = $product_id";
if ($conn->query($sql_update_voorraad) === TRUE) {
    echo "Voorraad bijgewerkt";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
