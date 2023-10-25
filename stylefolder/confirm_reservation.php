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








?>
<!DOCTYPE html>
<html>
<head>
    <title>Productinformatie</title>
</head>
<body>
    <?php if (isset($row)): ?>
  
        <h1><?php echo $row['NaamVanHetItem']; ?></h1><br>
        <img src="<?php echo $row['afbeeldingslocatie']; ?>" alt="Afbeelding">
        <p>Beschrijving: <?php echo $row['Beschrijving']; ?></p>
        <p> aantalbeschikbaar <?php echo $row['AantalBeschikbaar']; ?></p>
        <p> catorgie <?php echo $row['Categorie']; ?></p>
        

        <a href="form_res.php?itemID=<?php echo $row['ItemID']; ?>">Reserveren</a>

        <!-- Voeg andere productinformatie toe zoals afbeeldingen, beoordelingen, etc. -->
    <?php else: ?>
        <p>Product niet gevonden</p>
    <?php endif; ?>
    <?php if (isset($row1)): ?>
        <h1><?php echo $product_naam; ?></h1><br>
        <p>Lener: <?php echo $lenerNaam; ?></p>
        <p>Tijdsduur: <?php echo $tijdsduur; ?></p>
        <p>Aantal uitgeleend: <?php echo $aantal; ?></p>
        
        <!-- Voeg andere productinformatie toe zoals afbeeldingen, beoordelingen, etc. -->
    <?php else: ?>
        <p>Product niet gevonden</p>
    <?php endif;
    
$product_id = $_GET['itemID'];

// Stap 1: Haal de naam van het product op uit de 'items' tabel
$sql1 = "SELECT NaamVanHetItem FROM items WHERE ItemID = $product_id";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $product_naam = $row1['NaamVanHetItem'];

    // Stap 2: Gebruik de naam van het product om informatie uit de 'itemusers' tabel te halen
    $sql2 = "SELECT * FROM itemusers WHERE product = '$product_naam'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        echo "<h1>$product_naam</h1>";
        echo "<h2>Leners:</h2>";

        while ($row2 = $result2->fetch_assoc()) {
            $lenerNaam = $row2['naam'];
            $tijdsduur = $row2['duur'];
            $aantal = $row2['hoeveelheid'];
            echo "<p>Lener: $lenerNaam, Tijdsduur: $tijdsduur, Aantal: $aantal</p>";
        }
    } else {
        echo "Niemand leent dit item op dit moment";
    }
} else {
    echo "Fout bij het vinden van het product";
    header("refresh:1;url=../warehouse.php");
}?>
    



</body>
</html>