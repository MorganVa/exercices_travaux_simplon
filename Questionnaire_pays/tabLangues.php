<?php
  $requete = "SELECT * FROM langue";
  $resultats = $connexion->query($requete);
?>
  <div id="tableauLangues">
    <table>
     <caption id="titleTab">Langues</caption>
     <thead >
       <tr id="enteteTab">
         <th>Langue</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <?php
         while($row = $resultats->fetch()) {
           $id=$row['id_langue'];
          ?>
           <td><?php echo $row['nom']; ?></td>
           <td> <button name='modifier'><a href='#'>Modifier</a></button></td>
           <td> <button name='supprimer'><a href='http://localhost/Questionnaire_pays/suppression.php?IdLangueASupprimer=$id'>Supprimer</a></button></td>

        </tr>
       <? }
         $resultats->closeCursor();
       ?>
     </tbody>
    </table>
  </div>
