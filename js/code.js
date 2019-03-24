
function afficherPourEtudiant(){
	var eleEleves = document.getElementsByClassName("eleve");
	for(var i = 0; i< eleEleves.length; i++){
		eleEleves[i].setAttribute('style', 'visibility: visible;');
	}
	var inputEltEleve = document.getElementsByClassName("eleveInput");
	for(var i = 0; i<inputEltEleve.length; i++){
		inputEltEleve[i].required = true;
	}
}
function enleverPourEtudiant(){
	var eleEleves = document.getElementsByClassName("eleve");
	for(var i = 0; i< eleEleves.length; i++){
		eleEleves[i].setAttribute('style', 'visibility: collapse;');
	}
	var inputEltEleve = document.getElementsByClassName("eleveInput");
	for(var i = 0; i<inputEltEleve.length; i++){
		inputEltEleve[i].required = false;
	}
}

function afficherPourEnseignant(){
	var eleEnseignant = document.getElementsByClassName("enseignant");
	for(var i = 0; i< eleEnseignant.length; i++){
		eleEnseignant[i].setAttribute('style', 'visibility: visible;');
	}
	var inputEltEnseignant = document.getElementsByClassName("enseignantInput");
	for(var i = 0; i<inputEltEnseignant.length; i++){
		inputEltEnseignant[i].required = true;
	}
}
function enleverPourEnseignant(){
	var eleEnseignant = document.getElementsByClassName("enseignant");
	for(var i = 0; i< eleEnseignant.length; i++){
		eleEnseignant[i].setAttribute('style', 'visibility: collapse;');
	}
	var inputEltEnseignant = document.getElementsByClassName("enseignantInput");
	for(var i = 0; i<inputEltEnseignant.length; i++){
		inputEltEnseignant[i].required = false;
	}
}

//fonctions pour afficher le menu
var menuIsOpen = false;
function openNav() {
	document.getElementById("mySidenav").style.width = "30%";
	document.getElementById("login").focus();
	menuIsOpen = true;
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	menuIsOpen = false;
}

document.onkeydown = checkKey;
function checkKey(e) {
	e = e || window.event;
    if (e.keyCode == '222') { // keycode pour ²
    	if(menuIsOpen)
    		closeNav();
    	else
    		openNav();
    }
  }

//fonction pour bloquer un champ de texte (groupe/Td)
function SupprimerPourTD(){
	var groupe = document.getElementsByClassName("groupe");
	for(var i = 0; i< groupe.length; i++){
		groupe[i].disabled=false;
		groupe[i].setAttribute('style','background: #ffffff;');
	}
	var td = document.getElementsByClassName("td");
	for(var i = 0; i< td.length; i++){
		td[i].disabled=true;
		td[i].setAttribute('style','background: #dddddd;');
	}
}
function SupprimerPourGroupe(){
	var td = document.getElementsByClassName("td");
	for(var i = 0; i< td.length; i++){
		td[i].disabled=false;
		td[i].setAttribute('style','background: #ffffff;');
	}
	var groupe = document.getElementsByClassName("groupe");
	for(var i = 0; i< groupe.length; i++){
		groupe[i].disabled=true;
		groupe[i].setAttribute('style','background: #dddddd;');
	}
}

var pourToute = false;
function pourToutePromo(){
	if(!pourToute){
		var groupe = document.getElementsByClassName("groupe");
		for(var i = 0; i< groupe.length; i++){
			groupe[i].disabled=true;
			groupe[i].setAttribute('style','background: #dddddd;');
		}
		var td = document.getElementsByClassName("td");
		for(var i = 0; i< td.length; i++){
			td[i].disabled=true;
			td[i].setAttribute('style','background: #dddddd;');
		}
		document.getElementById("radioGpe").disabled = true;
		document.getElementById("radioTd").disabled = true;
	} else {
		var radioGpe = document.getElementById("radioGpe");
		radioGpe.disabled = false;
		document.getElementById("radioTd").disabled = false;
		radioGpe.checked = true;
		SupprimerPourTD();
	}
	pourToute = !pourToute;
}
