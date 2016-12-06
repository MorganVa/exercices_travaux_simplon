<?php

include('insertion.php');
include ('pdo.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Questionnaire Pays</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="formulaires">
      <?php
      include('formulaireAjouterPays.php');
      include('formulaireAjouterLangue.php');
      ?>
    </div>

    <div class="tableaux">
      <?php
      include('tabPays.php');
      include('tabLangues.php');
      ?>
    </div>
  </body>
</html>
