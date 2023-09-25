<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportenbeweging";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    echo $e->getMessage();
}



?>