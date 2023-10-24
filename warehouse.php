<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/warehouse.css">
</head>
<body>

<?php 

   require_once("stylefolder\header.php");
   require_once("stylefolder\zoeken.php");
   require_once("stylefolder\conecting.php");

 
 
   ?>
     <section class="item-grid">
       <?php
       $query = "SELECT * FROM items";
       $result = mysqli_query($conn, $query);

       if ($result) {
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<section class='item-section'>";
            echo "item id: " . $row['ItemID'] . "<br>";
            echo "item name: " . $row['NaamVanHetItem'] . "<br>";
            echo "beschrijving: " . $row['Beschrijving'] . "<br>";
            echo "aantalbeschikbaar: " . $row['AantalBeschikbaar'] . "<br>";
            echo "catorgie: " . $row['Categorie'] . "<br>";
            echo "<img class='item-img' src='" . $row['afbeeldingslocatie'] . "' alt='Afbeelding'>";
            echo "<a href='./stylefolder/confirm_reservation.php?itemID=" . $row['ItemID'] . "'>Details</a>"; // Voeg de link toe naar de detailpagina
            echo "</section>";

           }
       }


       if (isset($_GET['ItemID'])) {
        $itemID= $_GET['ItemID'];

        $query = "SELECT * FROM items WHERE ItemID = $itemID";
        $result = mysqli_query($conn, $query);
        // dan moet je de gegevens van het item laten zien
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<section class='item-section'>";
                echo "item id: " . $row['ItemID'] . "<br>";
                echo "item name: " . $row['NaamVanHetItem'] . "<br>";
                echo "beschrijving: " . $row['Beschrijving'] . "<br>";
                echo "aantalbeschikbaar: " . $row['AantalBeschikbaar'] . "<br>";
                echo "catorgie: " . $row['Categorie'] . "<br>";
                echo "<img class='item-img' src='" . $row['afbeeldingslocatie'] . "' alt='Afbeelding'>";
                echo "<a href='./stylefolder/confirm_reservation.php?itemID=" . $row['ItemID'] . "'>Details</a>"; // Voeg de link toe naar de detailpagina
                echo "</section>";
            }
        }


       } else {
              echo "geen item id gevonden";
       }
       ?>
    </section>
   <?php






   // dit pagina is om de producten te laten zien // dus hier komt alle producten en zo

    require_once("stylefolder\hooter.php");
 
 
 ?>

<a href="/GitHub/ala-1/stylefolder/producten.php">test</a>
</body>
</html>