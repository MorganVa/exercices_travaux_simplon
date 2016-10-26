//écrire une fonction qui prend un mail et un mot de passe
//et renvoie un Object avec ces informations

function identification (mail, motDePasse){
  this.mail = mail;
  this.motDePasse = motDePasse;
}
var monCompte = new identification ("bob@gmail.com", "12345");

console.log(mon compte);

//écrire une fonction qui reçoit un nombre de secondes
//et renvoie un texte en minutes

function secondesEnMinutes (nombreSecondes) {
  if (isNaN(nombreSecondes)) {
    alert ("Vous n'avez pas rentré de nombre, recommencez");
    secondesEnMinutes();
  }
  else {
    var resultat =" ";

    var nbJours = Math.floor(nombreSecondes/86400)
    var reste = nombreSecondes%86400;
    var nbHeures = Math.floor(reste/3600);
	  reste = reste%3600;
    var nbMinutes = Math.floor(reste/60);
    reste = reste%60;
    var nbSeconde = reste;

     if (nbJours>0)
      resultat = resultat+nbJours+(" jour(s) ");

     if (nbHeures>0)
      resultat = resultat+nbHeures+(" heure(s) ");

    if (nbMinutes>0)
      resultat = resultat+nbMinutes+(" minute(s) ");

    if (nbSeconde>0)
      resultat = resultat+nbSeconde+(" seconde(s) ");

     return (nombreSecondes+ " secondes donne :" + resultat);
  }
}

console.log(secondesEnMinutes ());


//calcul de moyenne (encore!)

var eleves = [
    {prenom:'Lea',nom:'Petit', note:10},
    {prenom:'Joe',nom:'Martin', note:15},
    {prenom:'Bob',nom:'Dupond', note:12}
];

function calculMoyenneClasse(listeEleves){
  var resultat=0;
  var moyenne;

    for (i=0; i <eleves.length; i++) {
      var noteEleve = parseInt((eleves[i]).note);
       resultat+=noteEleve;
      }

  moyenne = (resultat/(eleves.length)).toFixed(2); // toFixed pour arrondir a 2 après la virgule
 return moyenne;
}

console.log( calculMoyenneClasse(eleves) ); // renvoie 12.33 (2 chiffres après la virgule)
