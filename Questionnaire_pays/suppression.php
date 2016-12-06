<?php
 header('location:index.php');

 include ('pdo.php');

//on passe l'id de la ligne à supprimer (id du pays) via URL pour pouvoir le récupérer
if (isset($_GET['IdPaysASupprimer'])) {
   $idPaysASupprimer = $_GET['IdPaysASupprimer'];

   $qSuppression = "DELETE FROM `pays` WHERE `id_pays`=$idPaysASupprimer ";
   $rq = $connexion->prepare($qSuppression);
   $rq->execute();
};

//on passe l'id de la ligne à supprimer (id de la langue) via URL pour pouvoir le récupérer
 if (isset($_GET['IdLangueASupprimer'])) {
    $idLangueASupprimer = $_GET['IdLangueASupprimer'];

    $qSuppression = "DELETE FROM `langue` WHERE `id_langue`=$idLangueASupprimer ";
    $rq = $connexion->prepare($qSuppression);
    $rq->execute();
  };
?>
