<?php session_start(); // Start de sessie

if (isset($_SESSION["gebruikersnaam"])) {
    $gebruikersnaam = $_SESSION["gebruikersnaam"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Huidige gebruikersnaam en wachtwoord ophalen uit het formulier.
        $huidigeGebruikersnaam = $_POST['huidige_gebruikersnaam'];
        $huidigWachtwoord = $_POST['huidig_wachtwoord'];

        // Valideer de huidige gebruikersnaam en wachtwoord. Voer hier eventuele validatie en beveiliging uit.

        // Controleer of de huidige gebruikersnaam en wachtwoord overeenkomen met de ingelogde gebruiker.
        if ($huidigeGebruikersnaam === $gebruikersnaam && $huidigWachtwoord === $huidigWachtwoordVanDeDatabase) {
            // Huidige gebruikersnaam en wachtwoord zijn correct.

            // Nieuwe gebruikersnaam en wachtwoord ophalen uit het formulier.
            $nieuweGebruikersnaam = $_POST['nieuwe_gebruikersnaam'];
            $nieuwWachtwoord = $_POST['nieuw_wachtwoord'];

            // Hier kun je validatie en beveiliging toevoegen.

            // Maak een verbinding met de database
            require_once("connecting.php");

            // SQL-query om de gebruikersnaam en het wachtwoord te wijzigen (zonder wachtwoord hashen)
            $sql = "UPDATE gebruikers SET username = '$nieuweGebruikersnaam', password = '$nieuwWachtwoord' WHERE username = '$gebruikersnaam'";

            if ($conn->query($sql) === TRUE) {
                echo "Gebruikersnaam en wachtwoord zijn succesvol gewijzigd!";
                session_destroy();
                
                // Je kunt hier verdere acties ondernemen, bijvoorbeeld door de gebruiker opnieuw in te laten loggen.
            } else {
                echo "Fout bij het wijzigen van de gegevens: " . $conn->error;
            }

            // Sluit de databaseverbinding.
            $conn->close();
        } else {
            echo "Huidige gebruikersnaam en/of wachtwoord is incorrect.";
        }
    }
}
?>













<h1>Registreren</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Valideer en beveilig gebruikersinvoer hier.

        // Maak een verbinding met de database.
        require_once("conecting.php");

        // Gebruikersnaam en wachtwoord ophalen van het formulier.
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];

        // Controleer of de gebruiker al bestaat.
        $check_sql = "SELECT * FROM gebruikers WHERE username = '$gebruikersnaam'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            echo "Deze gebruiker bestaat al.";
        } else {
            // Gebruiker bestaat nog niet, voeg deze toe aan de database.
            $insert_sql = "INSERT INTO gebruikers (username, password) VALUES ('$gebruikersnaam', '$wachtwoord')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Gebruiker is toegevoegd.";
            } else {
                echo "Fout bij toevoegen van gebruiker: " . $conn->error;
            }
        }

        // Verbinding met de database sluiten.
        $conn->close();
    }
    ?>

    <form method="POST">
        Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
        Wachtwoord: <input type="password" name="wachtwoord" required><br>
        <input type="submit" value="Registreren">
    </form>











































