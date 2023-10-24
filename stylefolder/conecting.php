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
  
}
// dit is om connectie te maken met de database
?>



