<?php

include ('pdo.php');

if ((isset($_POST['nom']))&&(isset($_POST['capitale']))) {

  $nom = $_POST['nom'];
  $capitale = $_POST['capitale'];
  $drapeau = $_POST['drapeau'];
  $choixLangue = $_POST['choixLangue'];

// // Requete pour recuperer l'id de la langue selectionnée
//   $qSelection = "SELECT id_langue FROM langue WHERE `nom`='$choixLangue'"; // On selectionne tout dans la table langue pour la langue = langue choisie dans le select
//
//     $resultats = $connexion->query($qSelection); // on lance la requete
//     $langue = $resultats->fetch(); // on fetch sur les resultats pour recuperer la ligne
//     $idLangue = $langue["id_langue"]; // on recupere l'id dans la ligne recupérée


//Requete pour inserer le pays et ses caractéristiques dans la BDD
  $qInsertion = 'INSERT INTO `pays`(`nom`, `capitale`, `drapeau`) VALUES (:nom, :capitale, :drapeau)';
   $rq = $connexion->prepare($qInsertion); // On prépare la requete
   $rq->bindParam(":nom", $nom, PDO::PARAM_STR);
   $rq->bindParam(":capitale", $capitale, PDO::PARAM_STR);
   $rq->bindParam(":drapeau", $drapeau, PDO::PARAM_STR);
   $resultats = $rq->execute();

//Requete pour inserer dans la table de liaison id de la langue et id du pays pour faire la liaison
    $paysId = $connexion->lastInsertId(); //On récupère l'id du pays inséré
    $qInsertion2 = "INSERT INTO `langue_pays`(`id_langue`, `id_pays`) VALUES (:langueId, :paysId)"; // On insert dans la table de liaison les données
      $q2 = $connexion->prepare($qInsertion2);
      $q2->bindParam(":langueId", $choixLangue, PDO::PARAM_INT);
      $q2->bindParam(":paysId", $paysId, PDO::PARAM_INT);
      $q2->execute();
   };

//Requete pour inserer dans la BDD les langues rentrées dans le formulaire
 if ((isset($_POST['langue']))) {
   $langue = $_POST['langue'];
   $qInsertion = 'INSERT INTO `langue`(`nom`) VALUES (:nom)';
    $rq = $connexion->prepare($qInsertion);
    $rq->bindParam(":nom", $langue, PDO::PARAM_STR);
    $rq->execute();
  };

 ?>
