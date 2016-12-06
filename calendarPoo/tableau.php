<?php
include ("pdo.php");

if (isset($_GET['croissant'])) {
  $qtriCroissant = "SELECT * FROM `events` ORDER BY dStart";
  $resultats = $connexion->query($qtriCroissant);
  //  $rq = $connexion->prepare($qtriCroissant);
  //  $rq->execute();
}else {
  $requete = "SELECT * FROM events";
  $resultats = $connexion->query($requete);
}

?>

<div id="tableau" class="well">

  <table>
   <caption id="titleTab">Evenements</caption>
   <thead >
     <tr id="enteteTab">
       <th>Titre</th>
       <th>Date de début <a href="http://calendarevents.esy.es/index.php?croissant"> Trier</a></th>
       <th>Date de fin</th>
       <th>Créateur</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <?php
       while($row = $resultats->fetch()) {
         $id=$row['id_event'];?>
         <td><?php echo $row['summary']; ?></td>
         <td><?php echo $row['dStart']; ?></td>
         <td><?php echo $row['dEnd']; ?></td>
         <td><?php echo $row['mailCreator']; ?></td>
         <td><?php echo "<a href='http://calendarevents.esy.es/suppression.php?idEventASupprimer=$id'>Supprimer</a>"; ?></td>
      </tr>
     <? }
       $resultats->closeCursor();
     ?>
   </tbody>
  </table>
</div>
