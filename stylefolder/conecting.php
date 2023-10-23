<?php 
$servername = "localhost";
$username = "root";
$password = "Welkom01";
$dbname = "sportenbeweging";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    echo $e->getMessage();
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<p>Connected successfully</p>";
}

?>

<!-- ik heb wel een probleem want ik heb op mijn database een wachtwoord dus ik kan niet zonder ook
 -->


