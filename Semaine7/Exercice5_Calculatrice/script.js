var premierChiffre;
var deuxièmeChiffre;
var operateurHasard;
var compteur=0;
var afficheur = document.getElementById("ecran");
var compteurOperateur=0;
var deuxieme;
var deuxiemeBis;
var compteurEgal=0;


function chiffre(x){

  if (compteur <= 0 && compteurOperateur==0) {
  premierChiffre= x.innerHTML;
  compteur ++;
  afficheur.innerHTML = premierChiffre;
  return premierChiffre;

   }else if (compteur > 0 && compteurOperateur==0){
    deuxieme = x.innerHTML;
    premierChiffre+=deuxieme;
    afficheur.innerHTML += deuxieme;
      console.log("compteur",compteur);
    return premierChiffre;

  }else if (compteur > 0 && compteur <= 1&& compteurOperateur>0 ){
    deuxièmeChiffre= x.innerHTML;
    compteur ++;
    afficheur.innerHTML += deuxièmeChiffre;
     console.log("compteur",compteur);
    return deuxièmeChiffre;

   }else if (compteur > 1 && compteurOperateur>0 && compteurEgal<=0){
      deuxiemeBis = x.innerHTML;
    deuxièmeChiffre+=deuxiemeBis;
    afficheur.innerHTML += deuxiemeBis;
      console.log("compteur",compteur);
    return deuxièmeChiffre;

 }else {
   console.log("erreur");
 }
}

// TODO prendre en compte la virgule , transformer en point


function operateur(x) {

  operateurChoisi = x.innerHTML;
  console.log("operateur choisi",operateurChoisi);
  afficheur.innerHTML += operateurChoisi;
  compteurOperateur++;
  return operateurChoisi;
}

function somme() {

  var nombre1= parseInt(premierChiffre);
  var nombre2 = parseInt(deuxièmeChiffre);
  var operateur = operateurChoisi;
  var addition = eval(nombre1+operateur+nombre2).toFixed(2);
  console.log("resultat",addition);
  afficheur.innerHTML = addition;
  compteurEgal ++;
  return addition;
}

function reset () {
   premierChiffre = null;
   deuxièmeChiffre = null;
   operateurHasard = null;
   compteur=0;
  compteurOperateur=0;
  compteurEgal=0;

  afficheur.innerHTML = "";
  console.log("premierChiffre",premierChiffre);
  console.log("premierChiffre",premierChiffre);
}
