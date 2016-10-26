var reponse1 = "blanc";
var reponse2 = "7";
var reponse2Texte = "sept";
var compteur = 0;
  var afficheCompteur;

  function compte (etat) { // fonction compteur pour afficher perdu si on a tenté 3 fois
    var perd = document.getElementById(etat); // bloc à afficher
      if (compteur==3) { // si compteur est a trois
        setTimeout(function(){perd.style.opacity = 0.7;}, 200); // on fait apparaître le bloc perdu
        console.log("perdu");
      }
    }

function reponseUtilisateur1(){

  var reponseUser1 = document.getElementById("reponseQUestion1");// on récupère la réponse à la premiere question
  var deuxiemeQuestion = document.getElementById("bloc2")// on récupère le bloc de la 2eme question
  var perd = document.getElementById("perdu");
  afficheCompteur = document.getElementById("compteur");

  if (reponseUser1.value === reponse1.toLowerCase()){ // si la réponse est bonne
    deuxiemeQuestion.style.opacity = 1; // on affiche la 2ème
    perd.style.display="none";
    compteur=0;
  }else {
   reponseUser1.classList.add("error"); // sinon on affecte la classe "error"
   reponseUser1.value="Mauvaise réponse, rééssayez !";
   compteur++;
   afficheCompteur.innerHTML='Nombre de tentatives <br/> <br/>'+compteur;
   afficheCompteur.style.display="block";
   compte("perdu");
  }
}

function reponseUtilisateur2 () {
  var reponseUser2 = document.getElementById("reponseQUestion2");// on récupère la réponse à la 2ème question
  var gagne = document.getElementById("bravo");// on récupère le bloc du texte Bravo
  afficheCompteur = document.getElementById("compteur");

  if (reponseUser2.value === reponse2.toLowerCase() ||reponseUser2.value.toLowerCase() === reponse2Texte ) {// si la réponse est bonne
    setTimeout(function(){gagne.style.opacity = 0.7;}, 200); // on affiche que l'user a gagné et apparaît en fondu

  }else {
   reponseUser2.classList.add("error") // sinon on affecte la classe "error"
   reponseUser2.value="Mauvaise réponse, rééssayez !";
   compteur++; // on incrémente le compteur
   afficheCompteur.innerHTML='Nombre de tentatives <br/> <br/>'+compteur; // on rajoute du texte à la div compteur
   afficheCompteur.style.display="block"; // on fait apparaître la div
   compte("perdu2");// on lance la fonction compteur
  }
}

function reset (x) { // fonction pour retirer la classe erreur quand on retape une réponse (réinit quand on clique)

  if (x.classList.contains("error")){// si la classe est contenue
      x.classList.remove("error"); // on l'enlève
      x.value="";
    }
}
