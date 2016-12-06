<?php
  $requete = "SELECT * FROM pays"; // On selectionne tout dans la table pays
  $resultats = $connexion->query($requete);
?>

<div id="tableauPays"> <!-- tableau pour référencer les pays enregistrés avec ses infos -->
  <table>
   <caption id="titleTab">Pays</caption>
   <thead >
     <tr id="enteteTab">
       <th>Pays</th>
       <th>Capitale</th>
       <th>Drapeau</th>
       <th>Langue</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <?php
       while($row = $resultats->fetch()) { //tant qu'il y a des resultats dans la requete, on fais un fectch
         $id=$row['id_pays']; //On récupère l'id du pays en cours pour avoir ses caractéristiques

         $rq2 = "SELECT nom FROM langue NATURAL JOIN langue_pays WHERE id_pays = $id";//  Requete pour selectionner le nom dans la table langue en se basant sur le talble de liaison pour l'id pays fourni
         $resultats2 = $connexion->query($rq2);
         $row2 = $resultats2->fetch();
         $langue = $row2['nom'];

        ?>
         <td><?php echo $row['nom']; ?></td>
         <td><?php echo $row['capitale']; ?></td>
         <td><img src="pictures/<?php echo $row['drapeau'];?>" width=30px> </td>
         <td><?php echo $langue; ?></td>
         <td><button name='modifier'><a href='modification.php?IdPaysAModifier=<?php echo $id?>' >Modifier</a></button></td>
         <td><button name='supprimer'><a href='suppression.php?IdPaysASupprimer=<?php echo $id?>' >Supprimer</a></button></td>
      </tr>
     <? }
       $resultats->closeCursor();
     ?>
   </tbody>
  </table>
  </div>
