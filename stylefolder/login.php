
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
  
      $sql = "SELECT * FROM gebruikers WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);
  
      if ($result->num_rows == 1) {
        echo "<p>Welkom, $username!</p>";
        // terug naar index.php na 3 seconden
        $_SESSION["gebruikersnaam"] = $username;
        header("refresh:3;url=../index.php");
        $username = $_SESSION["gebruikersnaam"];

    } else {
        echo "<p>Ongeldige inloggegevens. Probeer opnieuw.</p>";
    }
}

 


    ?>
</article>
