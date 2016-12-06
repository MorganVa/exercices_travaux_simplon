<!-- Page de modification , si on appuie sur modifier, on redirige vers une page avec le formulaire prérempli  -->

<?php

include ('pdo.php');

//on passe l'id de la ligne à supprimer (id du pays) via URL pour pouvoir le récupérer
if (isset($_GET['IdPaysAModifier'])) { //Si un id est passé en get
  $idPaysAModifier = $_GET['IdPaysAModifier']; // On le récupère et l'enregistre dans une variable
  $qSelection = "SELECT * FROM `pays` WHERE `id_pays`=$idPaysAModifier "; //
    $resultats = $connexion->query($qSelection);
    $pays = $resultats->fetch();

    $nom =$pays['nom'];
    $capitale =$pays['capitale'];
    $drapeau = $pays['drapeau'];


};

if ((isset($_POST['nom']))&&(isset($_POST['capitale']))) {
  $nom = $_POST['nom'];
  $capitale = $_POST['capitale'];
  $drapeau = $_POST['drapeau'];

function needUpdateDrapeau() { // fonction pour savoir si drapeau est rempli et n'est pas une chaine de caractere vide
  return isset($_POST['drapeau']) && ($_POST['drapeau']!= "");
}

$qdrapeau = needUpdateDrapeau() ? ",`drapeau`=:drapeau" : "";

  $qModification = "UPDATE `pays` SET `nom` = :nom, `capitale`=:capitale $qdrapeau WHERE `id_pays`=$idPaysAModifier";
  // echo $qModification;
  $rq = $connexion->prepare($qModification);
  $rq->bindParam(":nom", $nom, PDO::PARAM_STR);
  $rq->bindParam(":capitale", $capitale, PDO::PARAM_STR);
  if (needUpdateDrapeau())
    $rq->bindParam(":drapeau", $drapeau, PDO::PARAM_STR);
  $rq->execute();
header('location:index.php');

};
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier un Pays</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class='formPays'>
      <h4>Modifier un pays</h4>
      <form id='loginForm' action="<?php $_SERVER['PHP_SELF'] ?>" method='post'>

         <label for='chpNom'>Pays
         </label>
         <input id='chpNom' type='text' name='nom' value="<?php echo $nom ?>"><br>

         <label for='chpCapitale'>Capitale
         </label>
         <input id='chpCapitale' type='text' name='capitale' value="<?php echo $capitale ?>"><br>

         <label for='chpDrapeau'>Drapeau
         </label>
         <img src='pictures/<?php echo $drapeau ?>'width=30px>
         <input id='chpDrapeau' type='file' name='drapeau' value="<?php echo $drapeau ?>" ><br>

         <button form='loginForm' type='submit'>Valider</button>
       </form>
    </div>
</body>
</html>
