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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de hoeveelheid op uit het ingediende formulier
    $hoeveelheid = $_POST['hoeveelheid'];

    // Haal de persoonsinformatie op uit het ingediende formulier
    $naam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $studentnummer = $_POST['studentnummer'];
    $duur = $_POST['duur'];

    // Controleer of de GET-parameter itemID is ingesteld
    if (isset($_GET['itemID'])) {
        $product_id = $_GET['itemID'];

        // Haal de naam van het item op met behulp van de ID
        $sql_get_item_name = "SELECT NaamVanHetItem FROM items WHERE ItemID = ?";
        $stmt_get_item_name = $conn->prepare($sql_get_item_name);
        $stmt_get_item_name->bind_param("i", $product_id);
        $stmt_get_item_name->execute();
        $result_item_name = $stmt_get_item_name->get_result();

        if ($result_item_name->num_rows > 0) {
            $row_item_name = $result_item_name->fetch_assoc();
            $product = $row_item_name['NaamVanHetItem'];

            // SQL-query om de persoonsinformatie en de naam van het item op te slaan
            $sql_insert_persoon = "INSERT INTO itemusers (naam, achternaam, studentnummer, duur, product, hoeveelheid) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert_persoon = $conn->prepare($sql_insert_persoon);
            $stmt_insert_persoon->bind_param("ssissi", $naam, $achternaam, $studentnummer, $duur, $product, $hoeveelheid);

            if ($stmt_insert_persoon->execute()) {
                // De persoonsinformatie en de naam van het item zijn opgeslagen in de database

                // Ga verder met de voorraadcontrole en het bijwerken van de voorraad zoals eerder in je code
                $sql_voorraad_check = "SELECT AantalBeschikbaar FROM items WHERE ItemID = ?";
                $stmt_voorraad_check = $conn->prepare($sql_voorraad_check);
                $stmt_voorraad_check->bind_param("i", $product_id);
                $stmt_voorraad_check->execute();
                $result_voorraad_check = $stmt_voorraad_check->get_result();

                if ($result_voorraad_check->num_rows > 0) {
                    $row = $result_voorraad_check->fetch_assoc();
                    $beschikbare_voorraad = $row['AantalBeschikbaar'];

                    if ($hoeveelheid <= $beschikbare_voorraad) {
                        $conn->begin_transaction();

                        $sql_update_voorraad = "UPDATE items SET AantalBeschikbaar = AantalBeschikbaar - ? WHERE ItemID = ?";
                        $stmt_update_voorraad = $conn->prepare($sql_update_voorraad);
                        $stmt_update_voorraad->bind_param("ii", $hoeveelheid, $product_id);

                        if ($stmt_update_voorraad->execute()) {
                            $conn->commit();
                            echo "Voorraad bijgewerkt.";
                            header("refresh:1;url=warehouse.php");
                        } else {
                            $conn->rollback();
                            echo "Fout bij bijwerken voorraad: " . $stmt_update_voorraad->error;
                        }
                    } else {
                        echo "Niet genoeg voorraad beschikbaar.";
                    }
                } else {
                    echo "Product niet gevonden.";
                }
            } else {
                echo "Fout bij opslaan persoonsinformatie en itemnaam: " . $stmt_insert_persoon->error;
            }
        } else {
            echo "Geen product gevonden.";
        }
    } else {
        echo "Fout bij het vinden van product.";
    }
}




$conn->close();
?>
