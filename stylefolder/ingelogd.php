<?php
require_once("conecting.php");

if(isset($_SESSION["username"])){
    ?><h1>welkom: <?php echo $_SESSION["username"];?></h1><?php
  }

?>