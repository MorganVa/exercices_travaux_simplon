<?php
 header('location:index.php');
 include ("pdo.php");
 
  $qtriCroissant = "SELECT * FROM `events` ORDER BY dStart";
   $rq = $connexion->prepare($qtriCroissant);
   $rq->execute();

  ?>
