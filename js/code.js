
function afficherPourEtudiant(){
	var eleEleves = document.getElementsByClassName("eleve");
	for(var i = 0; i< eleEleves.length; i++){
		eleEleves[i].setAttribute('style', 'visibility: visible;');
	}
}
function enleverPourEtudiant(){
	var eleEleves = document.getElementsByClassName("eleve");
	for(var i = 0; i< eleEleves.length; i++){
		eleEleves[i].setAttribute('style', 'visibility: collapse;');
	}
}

function afficherPourEnseignant(){
	var eleEnseignant = document.getElementsByClassName("enseignant");
	for(var i = 0; i< eleEnseignant.length; i++){
		eleEnseignant[i].setAttribute('style', 'visibility: visible;');
	}
}
function enleverPourEnseignant(){
	var eleEnseignant = document.getElementsByClassName("enseignant");
	for(var i = 0; i< eleEnseignant.length; i++){
		eleEnseignant[i].setAttribute('style', 'visibility: collapse;');
	}
}
