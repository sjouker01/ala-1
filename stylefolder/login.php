
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/loginstyle.css">
</head>
<body>
    
</body>
</html>

<?php
require_once("conecting.php");
// hier kan je inloggen
?>

    
<article>
    <section>
        <h2>Login</h2>
        <form action="" method="POST">
            <section>
                <label for="username">Username:</label>
                <input type="text" name="username-inlog" id="username" required>
            </section>

            <section>
                <label for="password">Password:</label>
                <input type="password" name="password-inlogen" id="password" required>
            </section>

            <section>
                <button type="submit" name="login">Login</button>
            </section>
        </form>
    </section>


    <?php

session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username-inlog'];
    $password = $_POST['password-inlogen'];

    $sql = "SELECT id, username FROM gebruikers WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $username = $row['username'];

        // Inloggen gelukt
        $_SESSION["gebruikersnaam"] = $username;
        $_SESSION["gebruikers_id"] = $id; // Sla de gebruikers-ID op in de sessie
        echo "<p>Welkom, $username!</p";

        // Terug naar index.php na 3 seconden
        header("refresh:1;url=index.php");
    } else {
        echo "<p>Ongeldige inloggegevens. Probeer opnieuw.</p>";
    }
}


 


    ?>
</article>
