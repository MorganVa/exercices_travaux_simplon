
var colors = ["red", "green", "yellow", "blue"];
var cartes = ["c0", "c1", "c2", "c3", "c4", "c5", "c6", "c7"];
var cartesBis = ["c0", "c1", "c2", "c3", "c4", "c5", "c6", "c7"];
var cartesPaire = [];
var interval;
var time = 20;
var text = "Il vous reste "
var textBis = " secondes";
var pairesTrouvees = 0;


var viewTime = document.getElementById("time");

function couleurInit() { // quand la page est chargée

  viewTime.innerText =text+ time + textBis; //: afficher le compteur
  colors.map(function(color){ // pour chaque couleur du tableau couleurs
    var hasard = Math.floor(Math.random()*(cartes.length)); // on tire un premier chiffre au hasard
    var premiereCarte = document.getElementById(cartes[hasard]); // on récupère l'élément html qui correspond au chiffre tiré au hasard
    var removed=cartes.splice(hasard,1); // on supprime dans le tableau des id l'element html deja attribué

    var hasardBis = Math.floor(Math.random()*(cartes.length)); // on tire un deuxième chiffre au hasard
    var deuxiemeCarte = document.getElementById(cartes[hasardBis]); // on récupère l'élément html qui correspond au chiffre tiré au hasard
    var removedBis=cartes.splice(hasardBis,1);  // on supprime dans le tableau des id l'element html

    premiereCarte.dataset.color=color; // on attribue à la 1ere et 2 eme carte le même data color
    deuxiemeCarte.dataset.color=color; // on attribue à la 1ere et 2 eme carte le même data color
  })
}

function showColor(idCard){ // fonction lancée quand on clique sur la carte

  if (interval===undefined) { // si c'est la première carte que l'on retourne on peut lancer la fonction temps
    temps();
  }

  var card = document.getElementById(idCard); // recupération de l'élément html cliqué
  if (card.style.backgroundColor==="grey"){ // si son background est gris (dos)
     card.style.backgroundColor=card.dataset.color; // on montre sa couleur attribuée plus haut avec data color

     if(cartesPaire.length == 0 || cartesPaire[0] != card) { // si il n'y a pas encore de carte retournée ou si la carte retournée est différente (pas 2 fois la même)
       cartesPaire.push(card); // on push la carte dans le tableau pour pouvoir comparer 2 cartes
     }
    if (cartesPaire.length == 2){ // si il y a 2 cartes dans le tableau on peut lancer la fonction de vérification
      verifie();
    }
  }
  card.classList.toggle('dos'); // effet de retournement de la carte
}

function verifie () {
  var titreGagne = document.getElementById("gagne");

  if(cartesPaire[0].dataset.color===cartesPaire[1].dataset.color){ // si les 2 carte cliquées ont la même couleur
       cartesPaire[0].setAttribute("onclick", ""); // on supprime la fonction affectée au clic pour que les cartes ne soient plus cliquables
       cartesPaire[1].setAttribute("onclick", ""); // on supprime la fonction affectée au clic pour que les cartes ne soient plus cliquables
       pairesTrouvees++; // on incrémente le compteur de paires trouvées
       cartesPaire = []; // on reinitialise le nombre de cartes cliquées

       if (pairesTrouvees == 4){ // si 4 paires on été trouvées
          titreGagne.style.visibility="visible"; // affiche que user a gagné
          titreGagne.classList.add("afficheStatut");
          clearInterval(interval); // le temps s'arrete
          }
  } else {
    retourneCarte(); // si les 2 cartes retournées sont différentes on lance la fonction pour retourner les cartes
  }
}

function retourneCarte(){
  var tempsA = setTimeout(function(){ // on lance une fonction de temps
    for (var i=0 ; i<2; i++){ // pour chacune des 2 cartes retournée
    if(cartesPaire[i].style.backgroundColor!='grey') { // si sa couleur est différente de grise
      cartesPaire[i].classList.toggle('dos'); // on la retounre automatiquement et on lui redonne sa couleur neutre
      cartesPaire[i].style.backgroundColor='grey';
    }
  }
    cartesPaire =[]; // on reinitialise le nombre de cartes cliquées
  }, 550) // nombre de ms pour effectuer l'action
}

function temps() {
  var titrePerdu = document.getElementById("perdu");
  interval = setInterval(function(){ // toute les secondes on décrémente le compteur de 1 seconde
    time--;
    viewTime.innerText =text + time + textBis; // et on l'affiche

    if(time == 0){ // si il ne reste plus de temps, on arrete de temps et l'user a perdu
      clearInterval(interval); // arrête le temps
      titrePerdu.style.visibility="visible"; // affiche que user a perdu
      titrePerdu.classList.add("afficheStatut");
      cartesBis.map(function(idCarte){ // fonction pour que lescarets restantes ne soient pas cliquables
        var carte = document.getElementById(idCarte);
        carte.setAttribute("onclick", "");
      })
    };
  }, 1000)
}


//TODO demander si user veut rejouer
