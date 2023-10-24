<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<!-- hier komt header -->
<header>
 <?php
require_once("conecting.php");
    ?>

    <a href="stylefolder\login.php"> login</a>

    <?php session_start(); 
    if(isset($_SESSION["username"])){
      ?><a  href="stylefolder\ingelogd.php"> <?php echo $_SESSION["username"];?></a><?php
    }
    ?>
</header>
    
</body>
</html>