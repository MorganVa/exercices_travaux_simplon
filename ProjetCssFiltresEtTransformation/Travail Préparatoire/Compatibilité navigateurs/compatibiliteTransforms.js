function apparaitre (navigateur) {
var texte = document.getElementById(navigateur).style.display;
  if(texte=='none') {
    document.getElementById(navigateur).style.display='block';
  } else {
    document.getElementById(navigateur).style.display='none';
  }
}
