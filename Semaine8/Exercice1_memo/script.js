var hasard;
var couleurs = ["red", "black", "yellow", "blue", "red", "black", "yellow", "blue"];
var couleursBis = ["red", "black", "yellow", "blue", "red", "black", "yellow", "blue"]
var couleurAleatoire;


function ChangeCouleur(id1,id2) {
  hasard = Math.floor(Math.random() *(couleursBis.length));
  couleurAleatoire = couleursBis[hasard];
  var removed=couleursBis.splice(hasard,1);
    console.log(couleurAleatoire);
  var carteAAfficher = document.getElementById(id1);
  var carteACacher = document.getElementById(id2);
  carteAAfficher.style.backgroundColor = couleurAleatoire;
  carteAAfficher.style.display="inline-block";
  carteACacher.style.display="none";
}
