

<?php
session_start();

if (isset($_SESSION['gebruikersnaam'])) {
    $gebruikersnaam = $_SESSION['gebruikersnaam'];
    echo "<h1>Welkom, $gebruikersnaam!</h1>";
} else {
    echo "U bent niet ingelogd.";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gebruikersgegevens bijwerken</title>
</head>
<body>
    <h1>Gebruikersgegevens bijwerken</h1>
    <form method="POST" action="">
        <label for="username">Nieuwe gebruikersnaam:</label>
        <input type="text" name="new_username" id="new_username" required><br>
        <label for="password">Nieuw wachtwoord:</label>
        <input type="password" name="new_password" id="new_password" required><br>
        <input type="submit" value="Bijwerken">
    </form>
</body>
</html>

<?php
require_once "conecting.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Controleer of de gebruikersnaam al bestaat in de database
    $checkExistingUserQuery = "SELECT id FROM gebruikers WHERE username = ?";
    $checkStmt = $conn->prepare($checkExistingUserQuery);
    $checkStmt->bind_param("s", $newUsername);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // De gebruikersnaam bestaat al, voer een UPDATE-query uit
        $updateQuery = "UPDATE gebruikers SET password = ? WHERE username = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $newPassword, $newUsername);
        $updateStmt->execute();
        $updateStmt->close();
        echo "Gebruikersgegevens bijgewerkt.";
    } else {
        // De gebruikersnaam bestaat niet, voer een INSERT-query uit
        $insertQuery = "INSERT INTO gebruikers (username, password) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ss", $newUsername, $newPassword);
        $insertStmt->execute();
        $insertStmt->close();
        echo "Nieuwe gebruiker toegevoegd.";
    }

    $checkStmt->close();
    header("refresh:1;url=../index.php");
    exit();
}

$conn->close();
?>
<a href="?logout=1">uitloggen</a>
<a href="../index.php">back</a>
<?php


if (isset($_GET['logout'])) {
    session_destroy();
    header("refresh:1;url=../index.php");
    exit();
}


?>

