<?php

include ('pdo.php');

  $requete = "SELECT * FROM langue"; // On selectionne tout dans la table langue
  $resultats = $connexion->query($requete);
?>

<div class="formPays">
  <h4>Ajouter des Pays</h4>
  <form id="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>"method="post">

     <label for="chpNom">Pays
     </label>
     <input id="chpNom" type="text" name="nom" placeholder="Nom à ajouter"/><br>

     <label for="chpCapitale">Capitale
     </label>
     <input id="chpCapitale" type="text" name="capitale" placeholder="Capitale à ajouter"/><br>

     <label for="chpLangue">Langue
     </label>
     <select name="choixLangue">
       <?php
       while($row = $resultats->fetch()) { //tant qu'il y a des resultats dans la requete, on fais un fetch
        echo '<option value="'.$row["id_langue"].'">'.$row["nom"].'</option>';
      };
      $resultats->closeCursor();
        ?>
      </select><br>

     <label for="chpDrapeau">Drapeau
     </label>
     <input id="chpDrapeau" type="file" name="drapeau" /><br>

     <button form="loginForm" type="submit">Valider</button>
  </form>
</div>
