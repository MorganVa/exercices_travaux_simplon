<?php
try {
 // on ouvre une connexion à la base de données
 $connexion = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8','root', '');
 } catch (Exception $excp) {
   die('Erreur : ' . $excp->getMessage());
 };
$requete = "SELECT * FROM events";
$resultats = $connexion->query($requete);
?>

<div id="tableau">

  <table>
   <caption id="titleTab">Evenements</caption>
   <thead >
     <tr id="enteteTab">
       <th>Titre</th>
       <th>Date de début <a href="http://localhost/calendar/tri.php"> Trier</a></th>
       <th>Date de fin</th>
       <th>Créateur</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <?php
       while($row = $resultats->fetch()) { ?>
         <td><?php echo $row['summary']; ?></td>
         <td><?php echo $row['dStart']; ?></td>
         <td><?php echo $row['dEnd']; ?></td>
         <td><?php echo $row['mailCreator']; ?></td>
     </tr>
     <? }
       $resultats->closeCursor();
     ?>
   </tbody>
  </table>

</div>
