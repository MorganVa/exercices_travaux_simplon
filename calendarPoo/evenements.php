<?php

class Evenement {
  public $summary;
  public $dStart;
  public $dEnd;
  public $mailCreator;
  public function __construct($summary,$dStart,$dEnd,$mailCreator)
  {
      $this->summary= $summary;
      $this->dStrat = $dStart;
      $this->dEnd = $dEnd;
      $this->mailCreator = $mailCreator;
  }
}


class ChargeurFichierJSON {
    function charge($chemin) {
      $ch = curl_init();
      // Configuration de l'URL et d'autres options
      curl_setopt($ch, CURLOPT_URL, $chemin);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      // Récupération de l'URL et affichage sur le naviguateur
      $calData = curl_exec($ch);
      // Fermeture de la session cURL
      curl_close($ch);
      // 2nd paramètre de json_decode
      //stdClass par défault monObjet->maPropriete
      //assoc = true par défault monObjet['maPropriete']
      return json_decode($calData, true);
          }
}


class GestionnaireEvenement {

    function chargeEvents() {
        $chargeur = new ChargeurFichierJSON();
        return $chargeur->charge("https://www.googleapis.com/calendar/v3/calendars/simplon.co_7sc0sp073u3svukpopmhob9fmg%40group.calendar.google.com/events?key=AIzaSyADm7UvQFnHmkfo_sei1oZoLvx_X-_mhFI");
        //chargeurAPIJSON->charge(url);
    }
}

$gestionnaireEvenement = new GestionnaireEvenement();
$events = $gestionnaireEvenement->chargeEvents();
print_r ($events['items']);

// for ($i = 0; $i < count($events); $i++) {
//   $evenement = $events[$i];
//    print_r ($evenement);
// }


 ?>
