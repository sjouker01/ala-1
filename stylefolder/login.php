
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


  if (isset($_POST['login'])) {
      $username = $_POST['username-inlog'];
      $password = $_POST['password-inlogen'];
  
      $sql = "SELECT * FROM gebruikers WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<p>Welkom " . $row['username'] . "</p>";
              sleep(1);

              session_start();
              $_SESSION['username'] = $username;
              header("Location: http://localhost/GitHub/ala-1/index.php");
              exit; // Zorg ervoor dat het script stopt na de redirect
          }
      } else {
          echo "<p>Gebruikersnaam of wachtwoord is onjuist</p>";

      }
  }
  


    ?>
</article>
