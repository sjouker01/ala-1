<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
       require_once("stylefolder/connecting.php");

       if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "<p>Connected successfully</p>";
    }
    ?>
    
</body>
</html>