<?php
// Dit om de reservering te bevestigen
?>

<?php 
require_once("conecting.php");

if (isset($_GET['itemID'])) {
    $product_id = $_GET['itemID'];

    // Stap 1: Haal de productinformatie op uit de 'items' tabel
    $sql = "SELECT * FROM items WHERE ItemID = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productinformatie</title>
</head>
<body>
    <h1><?php echo $row['NaamVanHetItem']; ?></h1>
    <img src="<?php echo $row['afbeeldingslocatie']; ?>" alt="Afbeelding">
    <p>Beschrijving: <?php echo $row['Beschrijving']; ?></p>
    <p>Aantal beschikbaar: <?php echo $row['AantalBeschikbaar']; ?></p>
    <p>Categorie: <?php echo $row['Categorie']; ?></p>

    <a href="form_res.php?itemID=<?php echo $row['ItemID']; ?>">Reserveren</a><br>

    <?php
    } else {
        echo "Product niet gevonden";
    }
} else {
    echo "Ongeldige product-ID";
}


require_once("conecting.php");
$sql = "SELECT  idItemUsers, naam, achternaam, studentnummer, duur, product, hoeveelheid FROM itemusers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<section class='item-section'>";
        // Create a link that goes to a personalized return page based on the item
        echo "<a href='terugbrengen.php?item_id=" . $row['idItemUsers'] . "'>" . $row['naam'] . " " . $row['achternaam'] . "</a><br>";
        echo "studentnummer: " . $row['studentnummer'] . "<br>";
        echo "duur: " . $row['duur'] . "<br>";
        echo "product: " . $row['product'] . "<br>";
        echo "hoeveelheid: " . $row['hoeveelheid'] . "<br>";
        echo "</section>";
    }
} else {
    echo "0 results";
}


   
?>

</body>
</html>



</body>
</html>