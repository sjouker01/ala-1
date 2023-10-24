<?php
// dit om de resvatie te confirmen
?>



<?php 
require_once("conecting.php");



$product_id = $_GET['itemID'];
$sql = "SELECT * FROM items WHERE ItemID = $product_id";
$result = $conn->query($sql);

if ($result->num_rows >0){
$row = $result->fetch_assoc();


} else {
    echo "error met vinden van product";
    header("refresh:1;url=../warehouse.php");
}




$conn->close();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Productinformatie</title>
</head>
<body>
    <?php if (isset($row)): ?>
        <!-- <img src="<?php echo $row['afbeeldingslocatie']; ?>" alt="Afbeelding"> -->
        <h1><?php echo $row['NaamVanHetItem']; ?></h1>
        <p>Beschrijving: <?php echo $row['Beschrijving']; ?></p>
        <p> aantalbeschikbaar <?php echo $row['AantalBeschikbaar']; ?></p>
        <p> catorgie <?php echo $row['Categorie']; ?></p>
        

        <a href="form_res.php?itemID=<?php echo $row['ItemID']; ?>">Reserveren</a>

        <!-- Voeg andere productinformatie toe zoals afbeeldingen, beoordelingen, etc. -->
    <?php else: ?>
        <p>Product niet gevonden</p>
    <?php endif; ?>
</body>
</html>