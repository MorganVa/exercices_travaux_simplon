<?php
 header('location:index.php');
 include ("pdo.php");

//on passe l'id de la ligne à supprimer (id de l'evenement) via URL pour pouvoir le récupérer
if (isset($_GET['idEventASupprimer'])) {
   $idEventASupprimer = $_GET['idEventASupprimer'];

   $qSuppression = "DELETE FROM `events` WHERE `id_event`=$idEventASupprimer ";

   $rq = $connexion->prepare($qSuppression);
   $rq->execute();

   };

?>
