<?php
 header('location:index.php');

    try {
      // on ouvre une connexion à la base de données
      $connexion = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8','root', '');
      } catch (Exception $excp) {
        die('Erreur : ' . $excp->getMessage());
      };

        $qtriCroissant = "SELECT * FROM `events` ORDER BY dStart";
         $rq = $connexion->prepare($qtriCroissant);
         $rq->execute();

  ?>
