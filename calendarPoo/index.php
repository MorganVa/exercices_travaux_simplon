<?php
include ("verif.php");
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'ajout d'un evenement</title>
  <!-- Lien vers fichier avec cdn de bootstrap -->
      <?php
      include("coBootstrap.html");
      ?>
</head>
<body>
  <header>
      <p>Calendrier</p>
  </header>

  <div class="formTab">

    <!-- On inclut le formulaire pour rajouter des evenements -->
    <?php
    include('formulaireRajoutEvent.php');
    ?>
    <!-- On inclut le tableau -->
    
    <?php
    include('tableau.php');
    ?>

  </div>



</body>
</html>
