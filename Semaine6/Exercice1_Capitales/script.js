var pays = [
    {pays: 'France', capitale: 'Paris'},
    {pays: 'Espagne', capitale: 'Madrid'},
    {pays: 'Italie', capitale: 'Rome'},
    {pays: 'Belgique', capitale: 'Bruxelles'},
];

function generateCountry() { // fonction pour tirer un pays au hasard
  var longueurPays = pays.length;
  nombreHasard = Math.floor(Math.random()*(longueurPays)); // tire un nombre qui correspondra a l'index de l'objet
  objetHasard = pays[nombreHasard]; // associe l'index à un objet
  paysHasard = objetHasard.pays; // prend le paramètre pays de l'objet
  return paysHasard;
}

function requestCapital() { // pose question à joueur
  answerUser = prompt ("Quelle est la capitale de "+paysHasard+ " ?");
  compareReponse();
}

function compareReponse () { // compare réponse joueur avec bonne réponse

  var answerCapital = objetHasard.capitale; // definit la bonne réponse
  if (answerUser.toLowerCase() === answerCapital.toLowerCase()) { // si util donne bonne réponse
      compteur++; // on incrémente le compteur
        (function () { // on lance la fonction pour poser nouvelle question
          if (compteur<4){ // si compteur est inferieur à 4
              alert ("Bravo, vous avez donné "+compteur+" bonne(s) réponse(s)");
              var removed = pays.splice(nombreHasard,1); // on supprime l'objet pour lequel on vient de poser la question ( pour ne pas poser 2 fois la même )
              play(); // on repose la question en changeant le pays
          }
          else { // si répondu à toutes les questions le jeu est fini
            alert ("Bravo vous avez gagné le jeu!!!");
          }
        })()
   }else{ // si pas bonne réponse
    compteurLoose++;
      if (compteurLoose===3) {
        alert("Vous avez perdu le jeu ! ");
        return;
      }
      else {
        alert("Mauvaise réponse, rééssayez");
        requestCapital();
      }
  }
}


var compteur = 0;
var compteurLoose = 0;
function play() {
  var nombreHasard;
  var paysHasard;
  var objetHasard;
  var reponseUtilisateur;
  generateCountry();
  requestCapital();
}
play();
