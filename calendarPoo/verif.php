<?php

include ("pdo.php");

$errorMessage = '';

// if(!empty($_POST['summary']) && !empty($_POST['dStart']) && !empty($_POST['dEnd'])
// && !empty($_POST['mailCreator'])) { // Si les champs ne sont pas vides
  if(isset($_POST['summary']) && isset($_POST['dStart']) && isset($_POST['dEnd'])
  && isset($_POST['mailCreator'])) { // Si les données sont bien fournies en POST



    // J'enregistre les valeurs fournies dans des variables réutilisables
      $summary = $_POST['summary'];
      $dStart = $_POST['dStart'];
      $dEnd = $_POST['dEnd'];
      $mailCreator =  $_POST['mailCreator'];

        if((strlen($summary)>1 && strlen($dStart)>1 && strlen($dEnd)>1 && strlen($mailCreator)>1)){

          // Requete préparée pour inserer les données dans la BDD
          $qInsertion = 'INSERT INTO events(summary, dStart, dEnd, mailCreator) VALUES (:summary, :dStart, :dEnd, :mailCreator)';

           $rq = $connexion->prepare($qInsertion);
           $rq->bindParam(":summary", $summary, PDO::PARAM_STR);
           $rq->bindParam(":dStart", $dStart, PDO::PARAM_STR);
           $rq->bindParam(":dEnd", $dEnd, PDO::PARAM_STR);
           $rq->bindParam(":mailCreator", $mailCreator, PDO::PARAM_STR);
           $rq->execute();
           $ajoutFailed = false;
  } else { // Si des champs sont vides
      $ajoutFailed = true;
      $errorMessage =
      '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Tous les champs ne sont pas remplis
      </div>';
  }
};

 ?>
