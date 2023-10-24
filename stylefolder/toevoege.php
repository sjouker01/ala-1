
<!-- hier is code om producten toevoegen
als ik tijd heb ga ik ook zorgen dat je fotos kan toevoegen maar dats niet belangerijk -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
  <h1>producten toevoegen</h1>
    <form action="" method="POST">
        <section>
            <label for="naam">naam:</label>
            <input type="text" name="naam" id="naam" required><br>
        </section>

        <section>
            <label for="beschrijving">beschrijving:</label>
            <input type="text" name="beschrijving" id="beschrijving" required><br>
        </section>

        <section>
            <label for="aantalbeschikbaar">aantalbeschikbaar:</label>
            <input type="text" name="aantalbeschikbaar" id="aantalbeschikbaar" required><br>
        </section>

        <section>
            <label for="categorie">categorie:</label>
            <input type="text" name="categorie" id="categorie" required><br>
        </section>

   

        <section>
            <button type="submit" name="toevoegen">toevoegen</button>
        </section>
    </form>
    </main>
</body>
</html>

<?php
require_once("conecting.php");
if (session_start() == null){
    session_start();
}

// hier kan je de info verzenden naar de database

if (isset($_POST['toevoegen'])) {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $aantalbeschikbaar = $_POST['aantalbeschikbaar'];
    $categorie = $_POST['categorie'];

    $sql = "INSERT INTO items (NaamVanHetItem, Beschrijving, AantalBeschikbaar, Categorie) VALUES ('$naam', '$beschrijving', '$aantalbeschikbaar', '$categorie')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("refresh:3;url=../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>