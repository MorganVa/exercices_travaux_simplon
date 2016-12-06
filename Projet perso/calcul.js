
var tauxHoraire;
var nombreHeuresSemaines;
var totalSalaire;

var nombreJours;
var indemnitésEntretien;
var indemnitésRepas;
var indemnitésGouter;
var totalIndemnités;

function calculSalaire () {

  tauxHoraire = document.getElementById("chpTauxHoraire").value;
  nombreHeuresSemaines = document.getElementById("chpNbrH").value;
  totalSalaire = document.getElementById("chpSalaire");
  var calcul = parseInt(((tauxHoraire*nombreHeuresSemaines)*52)/12);
  totalSalaire.value = calcul ;

};

function calculIndemnites () {
  nombreJours = document.getElementById("chpNbrJ").value;
  indemnitésEntretien = document.getElementById("chpEntretien").value;
  indemnitésRepas = document.getElementById("chpRepas").value;
  indemnitésGouter = document.getElementById("chpGouter").value;
  totalIndemnité= document.getElementById("chpIndemnités");

    if (document.getElementById('semaine').checked){
      var calcul = ((((nombreJours*indemnitésEntretien) + (nombreJours*indemnitésRepas)+(nombreJours*indemnitésGouter))*52)/12).toFixed(2);
      totalIndemnité.value = calcul;
    }

    if (document.getElementById('mois').checked){
      var calcul = ((nombreJours*indemnitésEntretien) + (nombreJours*indemnitésRepas)+(nombreJours*indemnitésGouter)).toFixed(2);
      totalIndemnité.value = calcul;
    }
}

function apparaitreGouter() {
  sectionGouter = document.getElementById("sectionGouter");

  sectionGouter.classList.toggle("visible");
}
