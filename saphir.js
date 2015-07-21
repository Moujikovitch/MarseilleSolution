//UTILITAIRE

var helps = {
  C:"Fonction retournant la classe indiqué en argument, exemple : C('container').style...",
  I:"Fonction retournant l'ID indiqué en argument, exemple : I('formulaire').value",
  size:"Fonction permettant d'écrire une taille pour le CSS à partir de donnée numérique, exemple : size(100,'vh') retourne '100vh'",
  incr:"Fonction permettant d'augmenter la valeur d'un paramètre CSS, exemple : incr(document.body.style.marginTop, 50) augmente de 50 la valeur du marginTop",
  floatRandom:"Fonction retournant un nombre aléatoire décimal entre le premier et second argument, exemple :floatRandom(5.10 , 20.5)",
  intRandom:"Fonction retournant un nombre aléatoire entier entre le premier et second argument, exemple :intRandom(10 , 25)",
  sinCurve:"Fonction retournant les valeurs d'une courbe sinusoïdale, le premier argument définit le nombre de valeur, le second la taille de la courbe",
  sinCurveDraw:"Fonction dessinant dans une div (spécifié par le premier argument), dessinant une courbe sinusoïdale d'une taille du second argument et d'une vitesse de défilement définie par le 3ème argument, le 4ème argument définit la couleur. Exemple : sinCurveDraw('content',5,10,'red')"
};
function helpSaphir() {
  console.log("helps.C");
  console.log("helps.I");
  console.log("helps.size");
  console.log("helps.incr");
  console.log("helps.floatRandom");
  console.log("helps.intRandom");
  console.log("helps.sinCurve");
  console.log("helps.sinCurveDraw");
};
//recupérer classe
function C(c) {
  return document.getElementsByClassName(c);
};
//recupérer ID
function I(i) {
  return document.getElementById(i);
};
//convertir nombre en mesure HTML
function size(n,m){
  return n.toString()+m;
};
function incr(cible,nombre){
  this.mesure = cible.substring(cible.length-2,cible.length);
  this.valeur = parseInt(cible);
  this.result = (valeur+nombre).toString()+mesure;
  return result;
};
//nombre aléatoire décimal sur portée définie
function floatRandom(d,f) {
  this.range = Math.abs(d-f);
  return Math.random()*range+d;
};
//nombre aléatoire entier sur portée définie
function intRandom(d,f) {
  this.range = Math.abs(d-f);
  return Math.round(Math.random()*range+d);
};
//fonction sinusoïsale avec taille
function sinCurve(i,t,s) {
    return Math.sin((i+t)/100)*s;
};
//dessiner une sinusoïsale en div
function sinCurveDraw(conteneur,taille,vitesse,couleur) {
  var sequence = {
    nombre:Math.round(I(conteneur).offsetWidth/10),
    taille:Math.round(I(conteneur).offsetHeight),
    frameCount:0,
  };
  for (i=0;i<sequence.nombre;i++){
  var barre = document.createElement("div");
  barre.className = "ligne";
  barre.style.position="relative";
  barre.style.float="left";
  barre.style.borderRightStyle="solid";
  barre.style.borderColor=couleur;
  barre.style.borderWidth="3px";
  barre.style.top="50%";
  I(conteneur).insertBefore(barre,null);
  C("ligne")[i].style.left = size(i*10,"px");
};
  var frameSin = setInterval(function(){
    sequence.frameCount++
    for (i=0;i<sequence.nombre;i++){
      C("ligne")[i].style.height = size(1+(sequence.taille/2+(Math.round(sinCurve(i*taille,sequence.frameCount*vitesse,sequence.taille/2)))),"px");
      C("ligne")[i].style.marginTop = ((parseInt(C("ligne")[i].style.height))/-2).toString()+"px";
    }
  },40);
};
//colorer body de manière dynamique
function rainbowBody() {
    document.addEventListener("mousemove", function(e){
    this.varY = (e.clientY/document.body.offsetHeight)*255;
    this.varX = (e.clientX/document.body.offsetWidth)*255;
    document.body.style.backgroundColor = "rgb("+Math.round(this.varY).toString()+","+Math.round(this.varX).toString()+","+(255-(Math.round(this.varY/2)+Math.round(this.varX/2))).toString()+")";
  });
};
//Générer poisson dans une div
function virtualAquarium(conteneur,nombre) {
  for(i=0;i<nombre;i++) {
    var poisson = document.createElement("div");
      poisson.className = "poisson";
      poisson.style.width = size(intRandom(10,30),"px");
      poisson.style.height = size(parseInt(poisson.style.width)/3,"px");
      poisson.stimulation = floatRandom(1,10);
      poisson.nage = false;
      poisson.vitesse = 0;
      poisson.direction = 0;
      poisson.style.position = "absolute";
      poisson.style.top = size(intRandom(1,100),"px");
      poisson.style.left = size(intRandom(-100,100),"px");
      poisson.style.backgroundColor = "blue";
      I(conteneur).insertBefore(poisson,null);
  };
  var frameAqua = setInterval(function(){
      
  },40);
};